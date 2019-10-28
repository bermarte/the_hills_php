<?php
session_start();

//echo $_SESSION['user_name_registration'];
if ( isset($_SESSION['user_name_registration'])){
    $_SESSION['user_name'] = $_SESSION['user_name_registration'];
}


//echo $_SESSION['']
require 'connection.php';
//home
if (isset($_POST['home'])){
    header('Location: index.php');
    return;
}
//erase everything
if (isset($_POST['erase'])){
    $_POST = array();
    session_destroy();
    /** @noinspection SqlResolve */
    $stmt = openConnection()->prepare("DELETE FROM student");
    $stmt->execute();
    session_start();
    $_SESSION['success'] = 'all records deleted';
    header('Location: insert.php');
    return;
}

if (isset($_POST['first_name'], $_POST['last_name'], $_POST['user_name'], $_POST['gender'],
    $_POST['linkedin'], $_POST['github'], $_POST['email'], $_POST['preferred_language'],
    $_POST['avatar'], $_POST['video'], $_POST['quote'], $_POST['quote_author'], $_POST['password'], $_POST['repeat_password'])) {

    if ($_POST['password'] !== $_POST['repeat_password']){
        $_SESSION['error'] = "the passwords do not match";
        header('Location: insert.php');
        return;
    }


    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $user_name = $_POST['user_name'];
    $gender = $_POST['gender'];
    $linkedin = $_POST['linkedin'];
    $github = $_POST['github'];
    $email = $_POST['email'];
    $preferred_language = $_POST['preferred_language'];
    $avatar = $_POST['avatar'];
    $video = $_POST['video'];
    $quote = $_POST['quote'];
    $quote_author = $_POST['quote_author'];
    $created_at = date('Y-m-d H:i:s');
    //hash password:
    //$hash = password_hash($password, PASSWORD_DEFAULT);
    //$password = $_POST['password'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    //radio inputs 'checked'
    $checked = " checked ";
    //get session's values when reloading
    foreach ($_POST as $key => $value){
        $_SESSION[$key]=$value;
        $s_values = [$key];
    }

    /** @noinspection SqlResolve */

    $stmt = openConnection()->prepare("INSERT INTO student (
                     first_name, last_name, user_name, github, gender,
                     linkedin, email, preferred_language, avatar, video,
                     quote, quote_author, created_at, password)
                    VALUES (:first_name, :last_name, :user_name, :github,
                            :gender, :linkedin, :email, :preferred_language,
                            :avatar, :video, :quote, :quote_author, :created_at, :password
                        )");

    $stmt->bindParam(':first_name', $first_name);
    $stmt->bindParam(':last_name', $last_name);
    $stmt->bindParam(':user_name', $user_name);
    $stmt->bindParam(':github', $github);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':linkedin', $linkedin);

    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':preferred_language', $preferred_language);
    $stmt->bindParam(':avatar', $avatar);
    $stmt->bindParam(':video', $video);
    $stmt->bindParam(':quote', $quote);
    $stmt->bindParam(':quote_author', $quote_author);
    $stmt->bindParam(':created_at', $created_at);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    unset($_SESSION['error']);
    $_SESSION['success'] = 'record added';
    //stop reposting
    header('Location: insert.php');
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
    <h1 class="text-center">insert new record</h1>
    <?php

    if (isset($_SESSION['success'])){
        echo "<div class=\"text-center\"><h3 class=\"badge badge-success\">".$_SESSION['success']."</h3></div>";
         unset($_SESSION['success']);
    }
    if (isset($_SESSION['warning'])){
        echo "<div class=\"text-center\"><h3 class=\"badge badge-danger\">".$_SESSION['warning']."</h3></div>";
        unset($_SESSION['warning']);
    }

    ?>
    <form action="" method="post" class="was-validated">

        <div class="row">
            <div class="form-group col-sm">
                <label for="first_name" class="mr-sm-2"><span class="badge badge-secondary">first name</span></label>
                <input type="text" name="first_name" class="form-control" required value="<?php if (isset($_SESSION['first_name'])) echo $_SESSION['first_name'];?>" placeholder="first name">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group col-sm">
                <label for="last name" class="mr-sm-2"><span class="badge badge-secondary">last name</span></label>
                <input type="text" name="last_name" class="form-control" required value="<?php if (isset($_SESSION['last_name'])) echo $_SESSION['last_name'];?>" placeholder="last name">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group col-sm">
                <label for="user_name"><span class="badge badge-secondary">user name</span></label>
                <input type="text" name="user_name" class="form-control" required value="<?php if (isset($_SESSION['user_name'])) echo $_SESSION['user_name'];?>" placeholder="user name">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm">
                <label for="gender"><span class="badge badge-secondary">gender</span></label>
                <div class="form-check">
                    <label class="form-check-label">

                        <input type="radio" class="form-check-input" name="gender" required value="male" <?php if (isset($_SESSION['gender']) && $_SESSION['gender']=="male") echo " checked "; ?>  >male
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="gender" required value="female" <?php if (isset($_SESSION['gender']) && $_SESSION['gender']=="female") echo " checked "; ?>  >female
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="gender" required value="other" <?php if (isset($_SESSION['gender']) && $_SESSION['gender']=="other") echo " checked "; ?> >other

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
                <input type="text" name="linkedin" class="form-control" required value="<?php if (isset($_SESSION['linkedin'])) echo $_SESSION['linkedin'];?>" placeholder="linkedin">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group col-sm">
                <label for="github"><span class="badge badge-secondary">github</span></label>
                <input type="text" name="github" class="form-control" required value="<?php if (isset($_SESSION['github'])) echo $_SESSION['github'];?>" placeholder="github">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm">
                <label for="email"><span class="badge badge-secondary">email</span></label>
                <input type="text" name="email" class="form-control" required value="<?php if (isset($_SESSION['email'])) echo $_SESSION['email'];?>" placeholder="email">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group col-sm">
                <label for="preferred_language"><span class="badge badge-secondary">preferred language</span></label>
                <input type="text" name="preferred_language" class="form-control" required value="<?php if (isset($_SESSION['email'])) echo $_SESSION['email'];?>" placeholder="preferred language">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>

            <div class="form-group col-sm">
                <label for="avatar"><span class="badge badge-secondary">avatar</span></label>
                <input type="text" name="avatar" class="form-control" required value="<?php if (isset($_SESSION['avatar'])) echo $_SESSION['avatar'];?>" placeholder="avatar">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm">
                <label for="video"><span class="badge badge-secondary">video</span></label>
                <input type="text" name="video" class="form-control" required value="<?php if (isset($_SESSION['video'])) echo $_SESSION['video'];?>" placeholder="video">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group col-sm">
                <label for="quote"><span class="badge badge-secondary">quote</span></label>
                <input type="text" name="quote" class="form-control" required value="<?php if (isset($_SESSION['quote'])) echo $_SESSION['quote'];?>" placeholder="quote">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group col-sm">
                <label for="quote_author"><span class="badge badge-secondary">quote author</span></label>
                <input type="text" name="quote_author" class="form-control" required value="<?php if (isset($_SESSION['quote_author'])) echo $_SESSION['quote_author'];?>" placeholder="quote author">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
        </div>
        <!-- password -->
        <?php
        if (isset($_SESSION['tmp_password'])){
            $pass = $_SESSION['tmp_password'];
        }
        ?>
        <div class="row">
            <div class="form-group col-sm">
                <label for="email"><span class="badge badge-secondary">password</span></label>
                <input type="password" name="password" class="form-control" required value="<?php if (isset($pass)) echo $pass;?>" placeholder="password">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group col-sm">
                <label for="email"><span class="badge badge-secondary">repeat password</span></label>
                <input type="password" name="repeat_password" class="form-control" required value="<?php if (isset($pass)) echo $pass;?>" placeholder="repeat password">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>

        </div>

        <div class="row">

            <div class="form-group col-sm text-center">
                <div class="btn-group">
                    <input type="submit" name="send" value="send data" class="btn btn-primary">
                    <input type="submit" name="erase" value="erase db" class="btn btn-primary" formnovalidate>
                    <input type="submit" name="home" value="home" class="btn btn-primary" formnovalidate>
                </div>
            </div>

    </form>

</div>

</body>
</html>

