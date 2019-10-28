<?php
session_start();

//erase SESSIONS

session_destroy();
session_start();

//if !$_SESSION['logged']= true exit


if (isset($_POST['register'])){

    if (isset($_POST['user']) && ! empty($_POST['user'])){

        $_SESSION['user_name_registration'] = $_POST['user'];
    }
   if ($_POST['password'] !== $_POST['repeat_password']){
       $_SESSION['error'] = "the passwords do not match";
       header('Location: start2.php');
       return;
   }
   else{
       $_SESSION['tmp_password']= $_POST['password'];
       $_SESSION['success'] = 'user name and password created';
       $_SESSION['warning'] = 'please complete the creation of your user';
       $_SESSION['logged']= true;
       header('Location: insert.php');
       return;
   }
}

if (isset($_POST['login'])){
    header('Location: login.php');
    return;
}
if (isset($_POST['registration_page'])){
    header('Location: register.php');
    return;
}
//var_dump($_POST);
if (isset($_POST['enter_login'])){
    //'login_user'
    //'login_password'
    if (isset($_POST['login_user'])) {
        $login_user = $_POST['login_user'];
        $login_password = $_POST['login_password'];
    }

    $stmt = openConnection()->prepare("SELECT * FROM student WHERE user_name = :user_name");
    $stmt->bindParam(":user_name", $login_user);
    $stmt->execute();
    $user = $stmt->fetch();

    if ($user && password_verify($login_password, $user['password']))
    {
        $_SESSION['can_edit']= true;
        $_SESSION['what_to_edit']= 'edit.php?user='.$user['id'];

        $_SESSION['logged']= true;

        header('Location: profile.php?user='.$user['id']);
        return;

    } else {
        $_SESSION['error'] = 'login error';
        header('Location: start.php');
        return;
    }

}