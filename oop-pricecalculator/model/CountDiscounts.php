<?php


class CountDiscounts
{
    public $var_discounts = [];
    public $fixed_discounts = [];

    public function getArray($arr){

        if(is_array($arr)) {
            foreach($arr as $obj) {

                $url = "../assets/groups.json";
                $json = file_get_contents($url);
                $objs = json_decode($json);

                foreach ($objs as $item) {
                    if ($item->id == $obj) {
                        if (isset($item->variable_discount)){
                            //echo "<br>"."variable found: ".$item->variable_discount."<br>";
                            $this->var_discounts[]=$item->variable_discount;
                        }
                        if (isset($item->fixed_discount)){
                           // echo "<br>"."fixed_discount: ".$item->fixed_discount."<br>";
                            $this->fixed_discounts[]=$item->fixed_discount;
                        }
                    }
                }
            }
        }
    }

}