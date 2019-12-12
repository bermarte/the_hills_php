<?php
declare(strict_types=1);

require "User.php";
//$model_path = str_replace('Controller', 'Model', dirname(__FILE__));

class Student extends User
{
    protected $id;
    protected $student_class_fk;
    public function getStudentName()
    {
        return $this->getName();
    }
    public function getStudentMail()
    {
        return $this->getEmail();
    }


    public function getStudentId()
    {
        return $this->id;
    }

    public function getStudentClassFk()
    {
        return $this->student_class_fk;
    }

    public function setStudentClassFk($_student_class_fk): void
    {
        $this->student_class_fk = $_student_class_fk;
    }




    public function setStudentId($_value) :void
    {

         $this->id = $_value;
    }

}
//echo "from student"."<br>";