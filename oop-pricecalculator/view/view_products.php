<?php

require('../model/error_report.php');

echo "                   <select name=\"product\" class=\"form-control\">\n";
for ($i=0;$i< count($products_list->products);$i++) {
    $element = $products_list->products[$i]->name;
    $element_id = $products_list->products[$i]->id;
    //select option
    if($element_id == $_GET['product'])
    {
        $prod_selected = "selected='selected' ";
    }
    else{
        $prod_selected ='';
    }   
    echo "                    <option value='".$element_id."' ".$prod_selected."'>".$element."</option>\n";
}
echo "                   </select>\n";