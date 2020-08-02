#Simplestream code challenge

#Set up

* Clone this repository
* Create MySQL database named 'simplestream'
* In the repository root folder, rename the .env.example file to .env
* Update .env file at the repository root folder to configure DB_HOST, DB_DATABASE, DB_USERNAME and DB_PASSWORD with your respective information
* In the repository root folder, run "composer install".
* In the repository root folder, run "composer start".
* To run the tests, run "composer test"

The server will be up and running at address http://127.0.0.1:8000.
The database will be seeded with 10 channels and 50 programmes.
Feel free to add or change the records for more tests.

#Making requests

1. Open Postman
2. Register a new user

    2.1 Send a POST request to the register endpoint with a body JSON like bellow:
    
    {
        
        "name": "user",
        "email": "user@email.com",
        "password": "secret123", //min. 6 characteres
        "password_confirmation": "secret123"
    }
3. Login with your credentials

    3.1 Send a POST request to the login endpoint with a body JSON like bellow:
    
    {
        
        "email": "user@email.com",
        "password": "secret123"
    }
    
    3.2 The response will contain a Bearer token needed for further requests.
4. Getting Channels, programme info and timetable

Use your bearer token as authorization method for every request

GET /api/channels    

GET /api/channels/{channel-uuid}/{date}/{timezone}
* channel-uuid: Integer
* date: 2020-08-01
* timezone: Any valid timezone eg: America/Los_Angeles (see full list at https://www.php.net/manual/en/timezones.php)

GET /api/channels/{channel-uuid}/programmes/{programme-uuid}
* channel-uuid: integer
* programme-uuid: integer 
