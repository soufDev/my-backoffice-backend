<?php

namespace App\Http\Controllers\api;

use App\Models\Studies;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class StudiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $studies = Studies::all();
       return Response::json($studies, 200, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = [
            'speciality' => $request->input('speciality'),
            'establishment' => $request->input('establishment'),
            'month_join' => $request->input('month_join'),
            'year_join' => $request->input('year_join'),
            'month_finish' => $request->input('month_finish'),
            'year_finish' => $request->input('year_finish'),
            'description' => $request->input('description')
        ];
        $studies = Studies::create($request->toArray());
        var_dump($studies);
        if(!$studies)
            return Response::json(["error" => "study can't be created"], 400);
        return response()->json(['study' => $studies], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $study = Studies::find($id);
        if ($study)
            return response()->json(['study'=>$study], 200);
        return response()->json(['message'=>'Not Found'], 404);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $study = Studies::find($id);
        if (!$study)
            return response()->json(['message'=>'Not Found'], 404);
        return response()->json(['study'=>$study], 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $study = Studies::find($id);
        if (!$study)
            return Response::json(['message'=>'Not Found'], 404);
        $study->update($request->toArray());
        return Response::json(['study' => $study], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $study = Studies::find($id);

        if(!$study)
            return Response::json(['message'=>'Not Found'], 404);
        $study->delete();
        return Response::json([], 204);
    }

}
