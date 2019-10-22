<?php
require '../model/Post.php';
require '../model/PostLoader.php';

 if (isset($_POST['submit'])){
     /*
     echo date('Y-m-d H:i A')."<br>";
     echo $_POST['mail']."<br>";
     echo $_POST['title']."<br>";
     echo $_POST['text_content']."<br>";
     */
     $name = $_POST['mail'];
     $title = $_POST['title'];
     $text_content = $_POST['text_content'];
     $date = date('Y-m-d H:i A');
     //build Post object
     //$_name, $_title, $_message, $_date

     $myPost = new Post($name, $title,$text_content,$date );

     //get data
     //getPostName
     //, getPostTitle, getPostMessage, getPostDate
     $got_postName = $myPost->getPostName();
     $got_postTitle = $myPost->getPostTitle();
     $got_postmessage = $myPost->getPostMessage();
     $got_postDate = $myPost->getPostDate();

     $showPost = true;

     $myPost->writeJson($name,$title,$text_content, $date);
 }
 //show posts
if (isset($_POST['show_posts'])){
    $showPost = false;
    $showPosts = true;
    $myposts = new Posts();
}