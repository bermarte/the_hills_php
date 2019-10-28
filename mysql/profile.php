<?php
session_start();

require 'connection.php';

if (!isset($_SESSION['logged'])) {
    header('Location: login.php');
}
if (!isset($_GET['user'])){
    header('Location: index.php');
    return;
}
else{
    $id = $_GET['user'];
    /** @noinspection SqlResolve */
    $stmt = openConnection()->prepare("SELECT * FROM student WHERE id=:id");
    $stmt->execute([':id' => $id]);
    $user = $stmt->fetchAll();

}

if ($_POST['insert']){
    header('Location: insert.php');
    return;
}
if ($_POST['home']){
    header('Location: index.php');
    return;
}
//edit user page
if ($_POST['edit']){
    header('Location: '.$_SESSION['what_to_edit']);
    return;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="stylesheet" href="bootstrap-4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="text-center">Profile of <?php echo $user[0]['first_name'].' '.$user[0]['last_name']?></h1>
     <div class="mt-5 mb-5">

         <div class="row">
             <div class="form-group col-sm">
                 <label for="first_name" class="mr-sm-2"><span class="badge badge-secondary">first name</span></label>
                 <input type="text" name="first_name" class="form-control" readonly value="<?php echo $user[0]['first_name'];?>">
             </div>
             <div class="form-group col-sm">
                 <label for="last name" class="mr-sm-2"><span class="badge badge-secondary">last name</span></label>
                 <input type="text" name="last_name" class="form-control" readonly value="<?php echo $user[0]['last_name'];?>">
             </div>
             <div class="form-group col-sm">
                 <label for="user_name"><span class="badge badge-secondary">user name</span></label>
                 <input type="text" name="user_name" class="form-control" readonly value="<?php echo $user[0]['user_name'];?>">
             </div>
         </div>

         <div class="row">
             <div class="form-group col-sm">
                 <label for="last name" class="mr-sm-2"><span class="badge badge-secondary">gender</span></label>
                 <input type="text" name="gender" class="form-control" readonly value="<?php echo $user[0]['gender'];?>">
             </div>
             <div class="form-group col-sm">
                 <label for="linkedin"><span class="badge badge-secondary">linkedin</span></label>
                 <input type="text" name="linkedin" class="form-control" readonly value="<?php echo $user[0]['linkedin'];?>">
             </div>
             <div class="form-group col-sm">
                 <label for="github"><span class="badge badge-secondary">github</span></label>
                 <input type="text" name="github" class="form-control" readonly value="<?php echo $user[0]['github'];?>">
             </div>
         </div>

         <div class="row">
             <div class="form-group col-sm">
                 <label for="email"><span class="badge badge-secondary">email</span></label>
                 <input type="text" name="email" class="form-control" readonly value="<?php echo $user[0]['email'];?>"">
             </div>
             <div class="form-group col-sm">
                 <label for="preferred_language"><span class="badge badge-secondary">preferred language</span></label>
                 <input type="text" name="preferred_language" class="form-control" readonly value="<?php echo $user[0]['preferred_language'];?>">
             </div>

             <div class="form-group col-sm">
                 <label for="avatar"><span class="badge badge-secondary">avatar</span></label>
                 <input type="text" name="avatar" class="form-control" readonly value="<?php echo $user[0]['avatar'];?>">
             </div>
         </div>

         <div class="row">
             <div class="form-group col-sm">
                 <label for="video"><span class="badge badge-secondary">video</span></label>
                 <input type="text" name="video" class="form-control" readonly value="<?php echo $user[0]['video'];?>">
             </div>
             <div class="form-group col-sm">
                 <label for="quote"><span class="badge badge-secondary">quote</span></label>
                 <input type="text" name="quote" class="form-control" readonly value="<?php echo $user[0]['quote'];?>">
             </div>
             <div class="form-group col-sm">
                 <label for="quote_author"><span class="badge badge-secondary">quote author</span></label>
                 <input type="text" name="quote_author" class="form-control" readonly value="<?php echo $user[0]['quote_author'];?>">
             </div>
         </div>

         <div class="row">
             <div class="form-group col-sm">
                 <label for="quote_author"><span class="badge badge-secondary">time stamp</span></label>
                 <input type="text" name="quote_author" class="form-control" readonly value="<?php echo $user[0]['created_at'];?>">
             </div>
         </div>

        <form action="" method="post">
        <div class="form-group col-sm text-center">
            <div class="btn-group">
                <input type="submit" name="insert" value="insert record" class="btn btn-primary">
                <input type="submit" name="home" value="home" class="btn btn-primary">
                <?php
                /*
                 $_SESSION['can_edit']= true;
                 $_SESSION['what_to_edit']= 'profile.php?user='.$user['id'];
                 */
                if (isset($_SESSION['can_edit'])){
                    echo "<input type=\"submit\" name=\"edit\" value=\"edit record\" class=\"btn btn-primary\">";
                }
                ?>
            </div>
        </div>
        </form>
</div>
</body>
</html>
