## Group API
### GET ALL GROUPS
   Returns JSON list data about all groups
* ##### URL 
        api/v1/groups
* ##### METHOD
        GET
* ##### URL Params
    ##### Required 
            None
* ##### Success Response 
    * ##### Code**
            200
    * ##### Content
            
            [
                {
                    id: String,
                    langKey: String, 
                    tags: list of String, (may be empty)
                    children: list of Object of group (may be null if iis the first parent)
                },
                {
                    ......
                },
                ......
            ]
            
* ##### Error Response
    * ##### Code
            404 
### GET GROUP
* #### URL
        /api/v1/groups/:id
* #### Method
        GET
* #### URL Params
    ##### Required
            id: String
* #### Data Params
        None
* #### Success Response
    * ##### Code
            200
    * ##### Content
            {
                id: 1,
                name: group1,
                tags: [ 'tag1', 'tag2',.... ],
                children: [
                    {
                        id: 4,
                        name: group5,
                        tags: ['tag1', 'tag4', .....],
                        children: [ list of group if it has a children ]
                    }
                ]
            }
* #### Error Response
    * ##### Code
            404
    * ##### Content
            None
    OR
    * ##### Code
            401
    * ##### Content
            None
## Create Group
* ####  URL
        /api/v1/groups/
* #### Method
        POST
* #### URL Params
    ##### Required
        name
* #### Data Params
    
        {
            id: String,
            langKey: String, 
            tags: list of String, (may be empty)
            children: list of Object of group (may be null if iis the first parent)
        }
        
* #### Success Response
    * ##### Code
            201
    * ##### Content
            Group
* #### Error Response
    * ##### Code  
            400
    * ##### Content
            idnotnull.error 
        OR
            groupnmaetaken.error 
        OR
            name.error
    * ##### Body
            ErrorMessage or null
            example : "name may not be empty"
    OR
    
    * ##### Code  
            404
    * ##### Content
            None
    OR 
    * ##### Code 
            204
    * ##### Content
            None            
## Update Group
   
* ####  URL
        /api/v1/groups/:id
* #### Method
        PUT
* #### URL Params
    ##### Required
        id=[String]
* #### Data Params
        {
            id: String,
            langKey: String, 
            tags: list of String, (may be empty)
            children: list of Object of group (may be null if iis the first parent)
        }
        
* #### Success Response
    * ##### Code
            204
    * ##### Content
            None
* #### Error Response
    * ##### Code
            400
    * ##### Content
            fieldName.error
            
            fieldName: Name
            
    * ##### Body
            ErrorMessage
            example :  "name may not be empty"
    OR
    
    * ##### Code
            404
    * ##### Content
            None
    OR 
    * ##### Code
            204
    * ##### Content
            None
## Delete Group
* ####  URL
        /api/v1/groups/:id
    
* #### Method
        DELETE
* #### URL Params
    ##### Required
        id=[String]
* #### Success Response
    * ##### Code
            204
    * ##### Content
            None
* #### Error Response
    * ##### Code
            404
    * ##### Content
            None

