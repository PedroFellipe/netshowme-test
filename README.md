NetShow.me recruitment test
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

    https://github.com/PedroFellipe/netshowme-test.git

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

In the current settings, the sent emails will be available in `` storage/logs/laravel.log`` if you wish send the actual email, you must change the settings in the ```.env``` file.    
To configure sending emails, you must change the following fields in the ```.env``` file. Note that the ```MAIL_TO``` variable indicates to which email contact requests will be sent

    MAIL_TO=email@example.com
    MAIL_MAILER=smtp
    MAIL_HOST=smtp.mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=username
    MAIL_PASSWORD=password
    MAIL_ENCRYPTION=tls

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

When performing unit tests, you should receive this as result
    
  ![Alt text](unit_tests.png?raw=true "Title")
