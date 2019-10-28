<?php

require 'connection.php';


//$_SESSION['what_to_edit']= 'edit.php?user='.$user['id'];
if (!isset($_GET['user'])){
    header('Location: index.php');
    return;
}
//select
else{
    $id = $_GET['user'];
    /** @noinspection SqlResolve */
    $stmt = openConnection()->prepare("SELECT * FROM student WHERE id=:id");
    $stmt->execute([':id' => $id]);
    $user = $stmt->fetchAll();
}
/*
 new_password
 new_repeat_password
 */
if (isset($_POST['edit'])){

    if ($_POST['new_password'] !== $_POST['new_repeat_password']){
        $_SESSION['error'] = "password are not equal";
        //header('Location: edit.php?user='.$id);
        //return;
    }
    else{
        //update data
        $data = [
            ':first_name' => $_POST['first_name'],
            ':last_name' => $_POST['last_name'],
            ':user_name' => $_POST['user_name'],
            ':gender' => $_POST['gender'],
            ':linkedin' => $_POST['linkedin'],
            ':email' => $_POST['email'],
            ':preferred_language' => $_POST['preferred_language'],
            ':avatar' => $_POST['avatar'],
            ':video' => $_POST['video'],
            ':quote' => $_POST['quote'],
            ':quote_author' => $_POST['quote_author'],
            ':created_at' => date('Y-m-d H:i:s'),
            ':github' => $_POST['github'],
            ':password' => password_hash($_POST['new_password'], PASSWORD_DEFAULT),
            ':id' => $id
        ];
        /** @noinspection SqlResolve */
        $sql = "UPDATE student SET 
                first_name=:first_name, last_name=:last_name, user_name=:user_name,
                gender=:gender, linkedin=:linkedin, email=:email, preferred_language=:preferred_language, 
                avatar=:avatar, video=:video, quote=:quote, quote_author=:quote_author,
                created_at=:created_at, github=:github, password=:password
                WHERE id=:id";
        $stmt= openConnection()->prepare($sql);
        $stmt->execute($data);

        $_SESSION['success'] = 'user data updated';
        header('Location: profile.php?user='.$id);
        return;
    }
}
if (isset($_POST['home'])){
    header('Location: index.php');
    return;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap-4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="text-center">modify record of <?php echo $user[0]['first_name'].' '.$user[0]['last_name']?></h1>
    <?php

    if (isset($_SESSION['success'])){
        echo "<div class=\"text-center\"><h3 class=\"badge badge-success\">".$_SESSION['success']."</h3></div>";
        unset($_SESSION['success']);
    }
    if (isset($_SESSION['error'])){
        echo "<div class=\"text-center\"><h3 class=\"badge badge-danger\">".$_SESSION['error']."</h3></div>";
       unset($_SESSION['error']);
    }

    ?>
    <form action="" method="post" class="was-validated">

        <div class="row">
            <div class="form-group col-sm">
                <label for="first_name" class="mr-sm-2"><span class="badge badge-secondary">first name</span></label>
                <input type="text" name="first_name" class="form-control" required value="<?php echo $user[0]['first_name'];?>" placeholder="first name">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group col-sm">
                <label for="last name" class="mr-sm-2"><span class="badge badge-secondary">last name</span></label>
                <input type="text" name="last_name" class="form-control" required value="<?php echo $user[0]['last_name'];?>" placeholder="last name">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group col-sm">
                <label for="user_name"><span class="badge badge-secondary">user name</span></label>
                <input type="text" name="user_name" class="form-control" required value="<?php echo $user[0]['user_name'];?>" placeholder="user name">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm">
                <label for="gender"><span class="badge badge-secondary">gender</span></label>
                <div class="form-check">
                    <label class="form-check-label">

                        <input type="radio" class="form-check-input" name="gender" required value="male" <?php if ($user[0]['gender']=='male') echo " checked ";?>  >male
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="gender" required value="female" <?php if ($user[0]['gender']=='female') echo " checked ";?>  >female
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="gender" required value="other"<?php if ($user[0]['gender']=='other') echo " checked ";?> >other

                        <?php $checkedGender = 1;

                        if (! empty($s_gender) || $checkedGender==1){
                            $feedback = "<div class=\"valid-feedback\" style=\"margin-left: -1.25em\">Valid.</div>";
                        }
                        echo $feedback;
                        ?>
                        <div class="invalid-feedback" style="margin-left: -1.25em">Please choose a gender.</div>
                    </label>

                </div>
            </div>
            <div class="form-group col-sm">
                <label for="linkedin"><span class="badge badge-secondary">linkedin</span></label>
                <input type="text" name="linkedin" class="form-control" required value="<?php echo $user[0]['linkedin'];?>" placeholder="linkedin">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group col-sm">
                <label for="github"><span class="badge badge-secondary">github</span></label>
                <input type="text" name="github" class="form-control" required value="<?php echo $user[0]['github'];?>" placeholder="github">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm">
                <label for="email"><span class="badge badge-secondary">email</span></label>
                <input type="text" name="email" class="form-control" required value="<?php echo $user[0]['email'];?>" placeholder="email">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group col-sm">
                <label for="preferred_language"><span class="badge badge-secondary">preferred language</span></label>
                <input type="text" name="preferred_language" class="form-control" required value="<?php echo $user[0]['preferred_language'];?>" placeholder="preferred language">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>

            <div class="form-group col-sm">
                <label for="avatar"><span class="badge badge-secondary">avatar</span></label>
                <input type="text" name="avatar" class="form-control" required value="<?php echo $user[0]['avatar'];?>" placeholder="avatar">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm">
                <label for="video"><span class="badge badge-secondary">video</span></label>
                <input type="text" name="video" class="form-control" required value="<?php echo $user[0]['video'];?>" placeholder="video">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group col-sm">
                <label for="quote"><span class="badge badge-secondary">quote</span></label>
                <input type="text" name="quote" class="form-control" required value="<?php echo $user[0]['quote'];?>" placeholder="quote">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group col-sm">
                <label for="quote_author"><span class="badge badge-secondary">quote author</span></label>
                <input type="text" name="quote_author" class="form-control" required value="<?php echo $user[0]['quote_author'];?>" placeholder="quote author">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm">
                <label for="new_password"><span class="badge badge-secondary">new password</span></label>
                <input type="password" name="new_password" class="form-control" required value="<?php if (isset($pass)) echo $pass;?>" placeholder="password">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group col-sm">
                <label for="new_rpeat_password"><span class="badge badge-secondary">repeat new password</span></label>
                <input type="password" name="new_repeat_password" class="form-control" required value="<?php if (isset($pass)) echo $pass;?>" placeholder="repeat password">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>

        </div>

        <div class="row">

            <div class="form-group col-sm text-center">
                <div class="btn-group">
                    <input type="submit" name="edit" value="send data" class="btn btn-primary">
                    <input type="submit" name="home" value="home" class="btn btn-primary" formnovalidate>
                </div>
            </div>

    </form>

</div>

