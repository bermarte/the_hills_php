<?php
session_start();
require 'connection.php';
require 'auth.php';


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>register</title>
    <link rel="stylesheet" href="bootstrap-4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="text-center">register</h1>
    <?php

    if (isset($_SESSION['error'])){
        echo "<div class=\"text-center\"><h3 class=\"badge badge-danger\">".$_SESSION['error']."</h3></div>";
        //unset($_SESSION['error']);
    }

    ?>
    <form action="" method="post" class="was-validated ">

        <div class="row justify-content-center">
            <div class="form-group col-md-6">
                <label for="first_name" class="mr-sm-2"><span class="badge badge-secondary">user name</span></label>
                <input type="text" name="user" class="form-control" required value="<?php if (isset($_SESSION['user'])) echo $_SESSION['user'];?>" placeholder="user name">
                <span class="help-block">choose your user name</span>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="form-group col-md-6">
                <label for="last name" class="mr-sm-2"><span class="badge badge-secondary">password</span></label>
                <input type="password" name="password" class="form-control" required value="" placeholder="password">
                <span class="help-block">choose your password</span>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="form-group col-md-6">
                <label for="last name" class="mr-sm-2"><span class="badge badge-secondary">password</span></label>
                <input type="password" name="repeat_password" class="form-control" required value="" placeholder="password">
                <span class="help-block">repeat your password</span>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
        </div>


        <div class="row">

            <div class="form-group col-sm text-center">
                <div class="btn-group">
                    <input type="submit" name="register" value="register" class="btn btn-primary">
                    <input type="submit" name="login" value="login" class="btn btn-primary" formnovalidate>
                </div>
            </div>

    </form>

</div>
</body>
</html>
