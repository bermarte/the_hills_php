<?php

require('../model/error_report.php');

echo "                    <select name = \"customer\" class=\"form-control\">\n";
for ($i=0;$i< count($customers_list->customers);$i++) {
    $element = $customers_list->customers[$i]->name;
    $element_id = $customers_list->customers[$i]->id;
    //select option
    if($element_id == $_GET['customer'])
    {
        $prod_selected = "selected='selected'";
    }
    else{
        $prod_selected ='';
    }
    //echo "<option value='".$element_id."' ".$prod_selected.">".$element."</option>\n";
    echo "                     <option value=$element_id $prod_selected>$element</option>\n";
}
echo "                    </select>\n";