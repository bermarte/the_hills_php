<?php
function openConnection() {
// Try to figure out what these should be for you
$dbhost    = "localhost";
$dbuser    = "becode_user";
$dbpass    = "password_becode";
$db        = "becode";

// Try to understand what happens here
$pdo = new PDO('mysql:host='. $dbhost .';dbname='. $db, $dbuser, $dbpass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

return $pdo;

}
