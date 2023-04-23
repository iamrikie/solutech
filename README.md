<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>






# Solutech
This is a Laravel backend test project.

<br><br>
### About the project
<p>Based on a given ERD, this is a task management system where users can create tasks, assign them to themselves or other users, set due dates, track the status of tasks using the status table, and add comments or remarks to tasks. The system should also allow for the creation and deletion of users, tasks, and statuses, as well as the ability to update and modify existing records. Finally, the system should keep track of timestamps for when records were created, updated, and deleted.</p>

<br><br>
### Getting Started
Follow the steps below to set up the project on your local machine.

<br>
#Prerequisites
- PHP 8.1 or later
- Composer
- A local development environment such as XAMPP, MAMP, or WAMP
- API Platform for software testing such as Postman, or Insomnia


<br><br>
#Installing
- Clone the repository using git clone https://github.com/iamrikie/solutech.git.
- Navigate to the project directory using cd solutech.
- Install the required dependencies using composer install.
- Copy the .env.example file to .env using cp .env.example .env.
- Generate a new application key using php artisan key:generate.
- Configure the database connection in the .env file.
- Migrate the database tables and seeders using php artisan migrate --seed.
- Start the development server using php artisan serve.


<br><br>
#Usage
- Access the application by visiting http://localhost:8000 in your web browser.
- To test the APIs, you can utilize Postman. You may either use the collection I used for testing, which I can provide to you, or create your own. For testing, make use of the URL http://127.0.0.1:8000/api/v1/...



<br><br>
## Endpoints Testing
#Steps
- Create a Collection and give it a name eg. Solutech
- Create folders under the collection you've created to group endpoints based on the kind of       payload each handle.  e.g. Task endpoint, Status endpoints, UserTask endpoints, Users endpoint,   Auth endpoints.<br>

- Add requests under each folder you've created. e.g.
      <pre><p>GET - Retrieve Tasks -  http://127.0.0.1:8000/api/v1/tasks</p>
        <p>POST - Add Tasks -  http://127.0.0.1:8000/api/v1/tasks</p>
        <p>GET - Retrieve Tasks By Id -  http://127.0.0.1:8000/api/v1/tasks/3</p>
        <p>PUT - Update task -  http://127.0.0.1:8000/api/v1/tasks/4</p>
        <p>DELETE - Delete task -  http://127.0.0.1:8000/api/v1/tasks/5</p>
        <p>POST - Login -  http://127.0.0.1:8000/api/v1/login <br>
        - Set Key "Content_Type" and Value "application/json"  <br>
        - You don't need to provide a token to login or register, but you will need to provide a valid token to log out. <br>
        - To generate a valid token, you may use laravel tinker, (run "<b><i>php artisan tinker</i></b>" on your terminal to start the tinker cli - Then type the next command "<b><i>$user = \User::first();</i></b>" That will return user id: 1 data. Proceed to the next command, "<b><i>$user->createToken('put-any-name-here');</i></b>" - That will generate a token. Copy paste it on postman.<br>
        - On the "Body" tab select the "raw" option, and enter the login credentials in JSON format.<br> For example:<br>
                    {<br>
                         "email": "ian@example.com",<br>
                         "password": "Password123"<br> 
                    }<br>
                    <b>Note:</b><i> Your pass has to be a minimum of 8 characters to be validated as I have defined in the AuthController.</i>
       </p></pre>
With that example, proceed testing the remaining endpoints. Check the api Routes for better understanding on how to proceed.

<br><br>
<b>Ps: </b><b><i>Code Optimization in Progress...</i><b>



<br><br>
## Built With
Laravel [v10]



