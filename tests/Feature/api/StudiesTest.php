<?php

namespace Tests\Feature\api;

use App\Models\Studies;
use Illuminate\Support\Facades\Artisan;
use Psy\Util\Str;
use Tests\TestCase;

class StudiesTest extends TestCase
{

    public function setUp() {
        parent::setUp();
        Artisan::call('migrate');
    }

    public function testGetStudies()
    {
        $study1 = factory(Studies::class)->create();
        $study2 = factory(Studies::class)->create();
        $study3 = factory(Studies::class)->create();
        $study4 = factory(Studies::class)->create();
        $response = $this->call('GET', '/api/studies');

        $studies = json_decode($response->getContent());
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(4, count($studies));
    }

    public function testGetStudy(){
        $study = factory(Studies::class)->create();
        $response = $this->call('GET', '/api/studies/1');

        $json = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(1, count($json->study));

        $response = $this->call('GET', '/api/studies/2');
        $json = json_decode($response->getContent());
        $this->assertEquals(404, $response->getStatusCode());

        $this->assertEquals('Not Found', $json->message);
    }

    public function testDeleteStudy(){
        factory(Studies::class)->create();
        $response = $this->call('DELETE', '/api/studies/1');

        $json = json_decode($response->getContent());
        $this->assertEquals(204, $response->getStatusCode());

        $response = $this->call('DELETE', '/api/studies/2');
        $json = json_decode($response->getContent());
        $this->assertEquals(404, $response->getStatusCode());
        $this->assertEquals('Not Found', $json->message);

    }

    public function testUpdateStudyOnFakeId()
    {
        factory(Studies::class)->create();
        factory(Studies::class)->create();
        factory(Studies::class)->create();
        $study = factory(Studies::class)->make();
        $response = $this->call('PUT', 'api/studies/4', $study->toArray());
        $json = json_decode($response->getContent());
        $this->assertEquals(404, $response->getStatusCode());
        $this->assertEquals('Not Found', $json->message);
    }

    public function testUpdateStudyOnExistId() {
        factory(Studies::class)->create();
        factory(Studies::class)->create();
        factory(Studies::class)->create();
        $study = factory(Studies::class)->make();
        $response = $this->call('PUT', 'api/studies/3', $study->toArray());
        $json = json_decode($response->getContent());
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals($study['speciality'], $json->study->speciality);
    }

    public function testEditStudyWithFakeId()
    {
        factory(Studies::class)->create();
        factory(Studies::class)->create();
        factory(Studies::class)->create();
        $response = $this->call('GET', 'api/studies/4/edit');
        $json = json_decode($response->getContent());
        $this->assertEquals(404, $response->getStatusCode());
        $this->assertEquals('Not Found', $json->message);
    }

    public function testEditStudyWithExistId()
    {
        $study1 = factory(Studies::class)->create();
        $study2 = factory(Studies::class)->create();
        $study3 = factory(Studies::class)->create();
        $response = $this->call('GET', 'api/studies/3/edit');
        $json = json_decode($response->getContent());
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals($study3->speciality, $json->study->speciality);
    }

    public function testPostStudy()
    {
        $study = factory(Studies::class)->make();
        $response = $this->call('POST', 'api/studies', $study->toArray());
        $json = json_decode($response->getContent());
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals($study->speciality, $json->study->speciality);
    }

    public function testPostStudyWithNull()
    {
        $input = [
            'speciality' => 'speciality',
            'establishment' => 'establishment',
            'month_join' => 'month_join',
            'year_join' => '',
            'month_finish' => 'month_finish',
            'year_finish' => 'year_finish',
            'description' =>  'description'
        ];
        $response = $this->call('POST', 'api/studies', $input);
        $json = json_decode($response->getContent());
        $this->assertEquals(400, $response->getStatusCode());
        // $this->assertEquals($study->speciality, $json->study->speciality);
    }
}
