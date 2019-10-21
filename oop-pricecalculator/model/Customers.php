<?php
require("error_report.php");

class Customers{
    public $customers = [];
    public function __construct(){
        $url = "../assets/customers.json";
        $json = file_get_contents($url);
        $objs = json_decode($json);

        if(is_array($objs)) {
            foreach($objs as $obj) {
                $this->customers[] = $obj;
            }
        }
    }
}