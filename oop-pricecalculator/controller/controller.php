<?php
require '../model/Customer.php';
require '../model/Customers.php';
require '../model/Product.php';
require '../model/Products.php';
require '../model/Group.php';
require '../model/Groups.php';
require '../model/CountDiscounts.php';
require '../model/CalculateResults.php';

$customers_list = new Customers();
$products_list = new Products();
$groups_list = new Groups();

//get products
if (isset($_GET['product'])
    && isset($_GET['customer'])){
    //show selected fields in the view
    $show_query = true;
    //create product object
    $prod_id = $products_list->products[$_GET['product']]->id;
    $prod_name = $products_list->products[$_GET['product']]->name;
    $prod_desc = $products_list->products[$_GET['product']]->description;
    $prod_price = $products_list->products[$_GET['product']]->price;
    $objprod = new Product($prod_id, $prod_name,$prod_desc,$prod_price);

    //create customer object
    $cust_id = $customers_list->customers[$_GET['customer']]->id;
    $cust_name = $customers_list->customers[$_GET['customer']]->name;
    $cust_group_id = $customers_list->customers[$_GET['customer']]->group_id;
    $objcustomer = new Customer($cust_id, $cust_name,$cust_group_id);


    //groups?
    $group_id = $cust_group_id;
    $group_name = $groups_list->groups[$_GET['customer']]->name;
    $next_group_id = $groups_list->groups[$_GET['customer']]->group_id;

    //var_dump($groups_list);

    $objgroups = new Groups();
    $ids = $objgroups->getIDs();
    $group_ids = $objgroups->getGroupIDs();

    $list_group = $objgroups->setGroupIds($group_id, $ids, $group_ids);

    $discounts = new CountDiscounts();
    $my_discounts = $discounts->getArray($list_group);

    /*
     discounts debug:
     var_dump($discounts->var_discounts);
     var_dump($discounts->fixed_discounts);
     */

    //results in view
    $myResult = new CalculateResults();
    $return = $myResult->calculate($discounts->fixed_discounts, $discounts->var_discounts, $prod_price);

}
