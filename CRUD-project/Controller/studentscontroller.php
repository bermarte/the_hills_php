<?php
declare(strict_types = 1);

$model_path = str_replace('Controller', 'Model', dirname(__FILE__));
require $model_path."/Student.php";

require $model_path."/Connection.php";

$connection = new Connection();
$pdo = $connection->openConnection();

$arr_students=[];

$stmt = $pdo->prepare("SELECT * FROM Student");
$stmt->execute();
$data = $stmt->fetchAll();
//var_dump($data);

foreach ($data as $key => $value){
    $student = new Student($value['Name'], $value['Email']);

    $student->setStudentId($value['Student_ID']);
    $student->setStudentClassFk($value['Student_Class_FK']);
    $arr_students[] = $student;
}
//echo "from student controller";
//var_dump($arr_students);