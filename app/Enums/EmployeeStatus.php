<?php


namespace App\Enums;


/* 

- Preserving this to futher improve distribution of tasks among 
different types of users and for a start Employees 

- So I will update my tables and have Employees table who can be either 
active(they can be assigned tasks) or inactive (They cant be assigned tasks)

- makes the project make more sense that way.

*/

enum EmployeeStatus: string
{
    case Active = 'active';
    case Disabled = 'disabled';
}
