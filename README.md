Coderockr recruitment test
=======================

Technologies Used:
-----------------------

 * PHP v7.3 or higher
 * Laravel v8.12
 * MySql v8.0.22
 * Vue v2.5.17

Project Installation and Execution
------------
Clone the project:

    git clone https://github.com/PedroFellipe/backend-test.git

After cloning the project, access the folder and run the following command to install the dependencies:

    composer install
    
After installation copy the .env.example file (If you are in a linux environment, just run the following command):

    cp .env.example .env

Now enter your local bank information in the following variables:

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=database
    DB_USERNAME=user
    DB_PASSWORD=password

Then, run the command below to run the project migrations:

    php artisan migrate
    
Run the command below to generate the application key:

    php artisan key:generate

Run the following command for install node dependecies and build the project

    npm install && npm run dev

To run the application run the laravel server:

    php artisan serve
    
Then, access the URL:

    http://localhost:8000/
      
Execution of unit tests:

    php artisan test

When performing unit tests, you should receive this as a result
    
  ![Alt text](unit_tests.png?raw=true "Title")
