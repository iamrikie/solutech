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
With that example, proceed testing the remaining endpoints. Check the api Routes for a better understanding on how to proceed.

<br><br>
<b>Ps: </b><b><i>Code Optimization in Progress...</i><b>



<br><br>
## Built With
Laravel [v10]




<br><br><br>
<b><i>The results of the API testing below illustrate both the interrelation between users, tasks, and status and the sequence of events in compliance with the provided Entity-Relationship Diagram (ERD).</i></b> <br>

![Screenshot 2023-04-23 122123](https://user-images.githubusercontent.com/56028045/233861073-b1fed9d0-2130-41be-84be-c9a01c4866c3.png) <br>

![Screenshot 2023-04-23 122221](https://user-images.githubusercontent.com/56028045/233861846-2786d436-74b6-443c-bf4f-09509f82e788.png) <br>

![Screenshot 2023-04-23 155620](https://user-images.githubusercontent.com/56028045/233862063-733f90d9-9ae3-4d75-ac17-79e043b266ba.png) <br>

![Screenshot 2023-04-23 121816](https://user-images.githubusercontent.com/56028045/233862209-d2a66f87-11d5-490c-9315-9e016adfece3.png) <br>

![Screenshot 2023-04-23 121948](https://user-images.githubusercontent.com/56028045/233862564-85679675-3b27-470d-af79-242e92d5ad0a.png) <br>

![Screenshot 2023-04-23 123059](https://user-images.githubusercontent.com/56028045/233864809-959de379-73a2-4197-878c-f9bb0b515503.png) <br>

![Screenshot 2023-04-23 233711](https://user-images.githubusercontent.com/56028045/233865105-d6d840cd-8354-4ee1-bf59-637ce1d883b2.png) <br>

![Screenshot 2023-04-23 235049](https://user-images.githubusercontent.com/56028045/233865632-52c8674a-f6f0-4cd2-9034-39e8715ddd05.png) <br>

![image](https://user-images.githubusercontent.com/56028045/234571333-6bdee975-f549-4dd1-bd33-0714ff375a79.png) <br>

![image](https://user-images.githubusercontent.com/56028045/234571780-f71936e8-a4b1-4ebe-9639-4c3acaea8019.png) <br>

![image](https://user-images.githubusercontent.com/56028045/234573774-e923c990-ed58-44f5-a0ac-f9aa024b07c0.png)



