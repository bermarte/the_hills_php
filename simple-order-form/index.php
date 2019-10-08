<?php
//this line makes PHP behave in a more strict way
declare(strict_types=1);

//we are going to use session variables so we need to enable sessions
session_start();
//https://stackoverflow.com/questions/8028957/how-to-fix-headers-already-sent-error-in-php
ob_start();

function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}
//whatIsHappening();
//your products with their price.

    if ((isset($_GET["food"]) && $_GET["food"]==1) || !isset($_GET["food"])){
        $products = [
            ['name' => 'Club Ham', 'price' => 3.20],
            ['name' => 'Club Cheese', 'price' => 3],
            ['name' => 'Club Cheese & Ham', 'price' => 4],
            ['name' => 'Club Chicken', 'price' => 4],
            ['name' => 'Club Salmon', 'price' => 5]
        ];
    };
    if (isset($_GET["food"]) && $_GET["food"]==0){
        $products = [
            ['name' => 'Cola', 'price' => 2],
            ['name' => 'Fanta', 'price' => 2],
            ['name' => 'Sprite', 'price' => 2],
            ['name' => 'Ice-tea', 'price' => 3],
        ];
    };


$totalValue = 0;

require 'form-view.php';
$email="";
$street="";
$streetnumber="";
$city="";
$zipcode="";


//fill the form
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //echo "POSTED";

    $email = test_input($_POST["email"]);
    $street = test_input($_POST["street"]);
    $streetnumber = test_input($_POST["streetnumber"]);
    $city = test_input($_POST["city"]);
    $zipcode = test_input($_POST["zipcode"]);

    $_SESSION['email'] = $email;
    $_SESSION['street'] = $street;
    $_SESSION['streetnumber'] = $streetnumber;
    $_SESSION['city'] = $city;
    $_SESSION['zipcode'] = $zipcode;

    /*
    echo $email."<br>";
    echo $street."<br>";
    echo $streetnumber."<br>";
    echo $city."<br>";
    echo $zipcode."<br>";
    */

    checkEmail($email);
    checkStreet($street);
    checkStreetNumber($streetnumber);
    checkCity($city);
    checkZipCode($zipcode);

    checkInputs(
        checkEmail($email), checkStreet($street),
        checkStreetNumber($streetnumber), checkCity($city),
        checkZipCode($zipcode)
    );

    //type of delivery
    $delivery = $_POST["delivery"];
    $_SESSION['delivery'] = $delivery;
    //checkTimeDelivery($_POST["delivery"]);
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
//check email
function checkEmail($val){
    //check if required attribute is removed and field is empty
    if (empty($val)) {
        $emailErr = "Email is required";
        $_SESSION['error'] = $emailErr;
        header('Location: index.php');
        return;
    }
    // check if e-mail address is well-formed
    if (!filter_var($val, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        $_SESSION['error'] = $emailErr;
        header('Location: index.php');
        return;
    }
    return true;
}
//check street
function checkStreet($val){
    if (empty($val)) {
        $emailErr = "Street is required";
        $_SESSION['error'] = $emailErr;
        header('Location: index.php');
        return;
    }
    return true;
}
//check street number
function checkStreetNumber($val){
    if (empty($val)) {
        $emailErr = "Street number is required";
        $_SESSION['error'] = $emailErr;
        header('Location: index.php');
        return;
    }
    if (isValidStreetNumber($val)=== false){
        $emailErr = "Invalid street number";
        $_SESSION['error'] = $emailErr;
        header('Location: index.php');
        return;
    }
    return true;
}
function isValidStreetNumber($val) {
    return (preg_match('/\d +[a-zA-Z]+|\d+/', $val)) ? true : false;
}
//check city
function checkCity($val){
    if (empty($val)) {
        $emailErr = "City is required";
        $_SESSION['error'] = $emailErr;
        header('Location: index.php');
        return;
    }
    return true;
}
//check zip code
function checkZipCode($val){
    if (empty($val)) {
        $emailErr = "Zipcode is required";
        $_SESSION['error'] = $emailErr;
        header('Location: index.php');
        return;
    }
    if (isValidZipCode($val)=== false){
        $emailErr = "Invalid zip code";
        $_SESSION['error'] = $emailErr;
        header('Location: index.php');
        return;
    }
    return true;
}
function isValidZipCode($val) {
    return (preg_match('/^[0-9]{5}(-[0-9]{4})?$/', $val)) ? true : false;
}
//check if all inputs are true
function checkInputs($val1,$val2,$val3,$val4,$val5){
    if ($val1=== true && $val2=== true && $val3=== true && $val4=== true && $val5=== true){
        $msg = "Your order is been sent";
        $_SESSION['success'] = $msg;
        header('Location: index.php');
        return;
    }
}



