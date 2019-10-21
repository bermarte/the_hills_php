<?php
require("error_report.php");

class Products{
    public $products = [];
    public function __construct(){
        $url = "../assets/products.json";
        $json = file_get_contents($url);
        $objs = json_decode($json);

        if(is_array($objs)) {
            foreach($objs as $obj) {
                $this->products[] = $obj;
            }
        }
    }
}
