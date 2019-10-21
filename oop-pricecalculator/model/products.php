<?php

//fetch products

$url = "../assets/products.json";
$products = array();

$json = file_get_contents($url);
$obj = json_decode($json);
//first fetch json
if(is_array($obj)) {
    foreach($obj as $key => $value) {
        echo $value->id . "<br>";
        echo $value->name . "<br>";
        echo $value->description . "<br>";
        echo $value->price . "<br>";
    }
}
else {
    echo "no data";
}






