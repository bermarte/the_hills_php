<?php
declare(strict_types = 1);

$model_path = str_replace('Controller', 'Model', dirname(__FILE__));
require $model_path."/Student.php";

require $model_path."/Connection.php";

class HomepageController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {
        //this is just example code, you can remove the line below
        //$user = new User('John Smith');

        //you should not echo anything inside your controller - only assign vars here
        // then the view will actually display them.

        //load the view
        require 'View/homepage.php';
    }
}
//$controller = new HomepageController();

$obj=new Connection();
$obj->openConnection();

$student = new Student('Jan', 'test@becode.be');

