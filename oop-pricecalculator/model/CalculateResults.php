<?php


class CalculateResults
{
    public function calculate( $fixedarray,  $variable_array, $price){

        $value_fixed = array_sum ($fixedarray);
        if (is_array($variable_array) && !empty($variable_array)){
            $value_variable = max($variable_array);
        }
        else{
            $value_variable = 0;
        }

        //fixed value
        $price_fixed = $price - $value_fixed;

        //variable value
        //percentage
        //tot * perc /100
        $variable_discount_tmp = ($price * $value_variable)/100;
        $price_variable = $price-$variable_discount_tmp;

        //sanitize output
        if ($price_fixed < 0){
            $price_fixed = 0;
        }
        if ($price_variable < 0){
            $price_variable = 0;
        }

        $best_discount = round(min($price_fixed,$price_variable),2);
        return $best_discount;

    }
}