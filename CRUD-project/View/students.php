<?php
require '../Controller/studentscontroller.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Students</title>
</head>
<body>

<div class="container p-3rem mt-5">
    <table class="table  table-dark table-bordered table-hover  ">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Id</th>
            <th scope="col">Class</th>
            <th scope="col">Teacher Name</th>
        </tr>
        </thead>
        <tbody>

        <?php
        //var_dump($arr_students);
        foreach($arr_students as $item){

            //get the class name
            $id = $item->getStudentClassFk();
            $stmt = $pdo->prepare("SELECT Name FROM Class WHERE Class_ID =:id");
            $stmt->execute([':id' => $id]);
            $my_class = $stmt->fetch();
            //var_dump($my_class);
            //get the teacher name

            $id = $item->getStudentClassFk();
            $stmt = $pdo->prepare("SELECT Name FROM Teacher WHERE Teacher_Class_FK =:id");
            $stmt->execute([':id' => $id]);
            $my_teacher = $stmt->fetch();

            echo "<tr><td>".$item->name."</td><td>".$item->getStudentMail()."</td><td>".$item->getStudentId()."</td><td>".$my_class['Name']."</td><td>".$my_teacher['Name']."</td></tr>";
        }
        ?>
        <!--
        <tr>
            <td>

            </td>
            <td>

            </td>

        </tr>
        -->

        </tbody>
    </table>
</div>


</body>
</html>
