<?php
//https://stackoverflow.com/questions/27998004/what-is-the-right-way-to-set-the-correct-path-in-php

$controller_path = str_replace('View', 'Controller', dirname(__FILE__));
require $controller_path.'/HomepageController.php';

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Becode - MVC</title>
</head>
<body>
    <?php require 'includes/header.php'?>
    <section>
        <h4>Hello <?php  echo $student->getStudentName(); ?></h4>
        <p>Put your content here.</p>
    </section>
    <?php require 'includes/footer.php'?>
</body>
</html>