<?php
session_start();
if ($_POST['register_again']){
    //restart();
    header('Location: register.php');
    return;
}
if($_POST['enter_login_again']){
    //restart();
    header('Location: login.php');
    return;
}
function restart(){
    $_POST = array();
    session_destroy();
    session_start();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    <link rel="stylesheet" href="bootstrap-4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container vertical-center">
    <h1 class="text-center">register</h1>
    <?php

    if (isset($_SESSION['error'])){
        echo "<div class=\"text-center\"><h3 class=\"badge badge-danger\">".$_SESSION['error']."</h3></div>";
        unset($_SESSION['error']);
    }

    ?>
    <form action="" method="post" class="was-validated start">
        <div class="form-group col-sm text-center">

            <div class="btn-group">
                <input type="submit" name="register_again" value="register again" class="btn btn-primary" formnovalidate>
                <input type="submit" name="enter_login_again" value="login" class="btn btn-primary">
            </div>
        </div>
    </form>

</div>
