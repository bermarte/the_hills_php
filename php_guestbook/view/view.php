<?php
require("../controller/error_report.php");
require '../controller/controller.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Guest book</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="container">
    <div class="row">
        <form action="#" method="post">
            <div class="form-group">
                <div class="col-sm">
                <fieldset>

                        <legend class="text-center">Guestbook:</legend>

                    email:<br>
                    <input type="text" name="mail" value="<?php if (isset($_POST['mail'])) {echo $_POST['mail'];} else{ echo "write your mail";} ?>">
                    <br>

                    title:<br>
                    <input type="text" name="title" value="<?php if (isset($_POST['title'])) {echo $_POST['title'];} else{ echo "write your title";} ?>">
                    <br>


                    Message:<br>
                    <textarea rows="4" cols="50" name="text_content"><?php if (isset($_POST['text_content'])) {echo $_POST['text_content'];} else{ echo "write something";} ?></textarea>
                    <br>
                    <div class="text-center">
                        <input type="submit" value="Send" name="submit">
                        <input type="submit" value="show posts" name="show_posts">
                    </div>
                </fieldset>
                </div>
            </div>
        </form>
    </div>

    <?php
    //check latest object-post
    if ($myPost= true){
        if (isset($got_postName) && isset($got_postTitle) &&
            isset($got_postmessage) && isset($got_postDate)){
            $result = "<hr class=\"mt-5 mb-5\">";
            $result .= "<div class=\"col-sm text-left\">";
            $result .= "<p><strong>name:</strong> ".$got_postName."<p>";
            $result .= "<p><strong>title:</strong> ".$got_postTitle."<p>";
            $result .= "<p><strong>message:</strong> ".$got_postmessage."<p>";
            $result .= "<p><strong>date:</strong> ".$got_postDate."<p>";
            $result .="</div>";

            echo $result;
        }
    }
    if ($showPosts= true){

        if (isset($myposts)){

            $result = "<hr class=\"mt-5 mb-5\">";
            $result .= "<div class=\"col-sm text-left\">";
            //reverse array
            $my_messages = array_reverse($myposts->messages,true);
            foreach ($my_messages as $message){


                foreach ($message as $part) {
                    echo $part."<br>";
                }
                echo "*******<br>";
            }

            $result .="</div>";

            echo $result;
        }

    }
    ?>

</div>
</body>
</html>