<?php
declare(strict_types=1);
if(!defined('MyConst')) {
    die('Direct access not permitted');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css"
          rel="stylesheet"/>
    <title>Order food & drinks</title>
</head>
<body>
<div class="container">

    <h1>Order food in restaurant "the Personal Ham Processors"</h1>
    <nav>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" href="index.php?food=1" name="food">Order food</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?food=0" name="drink">Order drinks</a>
            </li>
        </ul>
    </nav>
    <?php
    //modal error
    if (isset($_SESSION['error'])){
        echo "<div id='alert' class='alert alert-danger'>
        <strong>Warning!</strong>&nbsp;".$_SESSION['error']."!&nbsp;&nbsp;<br>
        </div>";
        unset($_SESSION['error']);
    }
    //modal success
    if (isset($_SESSION['success'])){
        echo "<div id='success' class='alert alert-success'>
        <strong>Success!</strong>&nbsp;".$_SESSION['success']."!&nbsp;&nbsp;<br>
        </div>";
        unset($_SESSION['success']);
    }
    ?>
    <form method="post" action="index.php">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email">E-mail:</label>
                    <input type="text" id="email" name="email" class="form-control" required value="<?php if (isset($_SESSION['email'])) echo $_SESSION['email'];?>">
            </div>
            <div></div>
        </div>

        <fieldset>
            <legend>Address</legend>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="street">Street:</label>
                    <input type="text" name="street" id="street" class="form-control" required value="<?php if (isset($_SESSION['street'])) echo $_SESSION['street'];?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="streetnumber">Street number:</label>
                    <input type="text" id="streetnumber" name="streetnumber" class="form-control" required value="<?php if (isset($_SESSION['streetnumber'])) echo $_SESSION['streetnumber'];?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="city">City:</label>
                    <input type="text" id="city" name="city" class="form-control" required value="<?php if (isset($_SESSION['city'])) echo $_SESSION['city'];?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="zipcode">Zipcode</label>
                    <input type="text" id="zipcode" name="zipcode" class="form-control" required value="<?php if (isset($_SESSION['zipcode'])) echo $_SESSION['zipcode'];?>">
                </div>
            </div>
        </fieldset>
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <fieldset>
                        <legend>Products</legend>
                        <?php foreach ($products AS $i => $product): ?>
                            <label>
                                <input type="checkbox" value="1" name="products[<?php echo $i ?>]"/> <?php echo $product['name'] ?> -
                                &euro; <?php echo number_format($product['price'], 2) ?></label><br />
                        <?php endforeach; ?>
                    </fieldset>
                </div>
                <div class="col-sm">

                    <!-- ndelivery method -->
                    <fieldset>
                        <legend>Delivery</legend>
                        <select name="delivery" class="browser-default custom-select">
                        <?php
                        $delivery_time = "";
                        if ($_SESSION['delivery']== 'normal' || !isset($_SESSION['delivery']) || $_SESSION['delivery']==""){
                             $delivery_time = "2 hours";
                             echo "<option value='normal' selected>Normal</option>
                                   <option value='fast'>Fast</option>";
                        }
                        else{
                            $delivery_time = "45 minutes";
                            echo "<option value='normal'>Normal</option>
                                  <option value='fast' selected>Fast</option>";
                        };
                        ?>

                    </select>

                    </fieldset>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Order!</button>
    </form>
    <?php echo "<br>"?>
    <!-- to be removed later -->
   <?php echo 'To be delivered in '.$delivery_time;?>
   <?php
   //$_SESSION['get_products']= $products;
   if (isset($_POST["products"])){
       echo "<hr>";

       foreach ($_POST["products"] as $key => $value){
           echo  'You selected: '.$products[$key]['name']. ' price: '.$products[$key]['price']." euro<br>";
           $totalValue += $products[$key]['price'];
       }
   }
   ?>



    <footer>You already ordered <strong>&euro; <?php echo $totalValue ?></strong> in food and drinks.</footer>
</div>

<style>
    footer {
        text-align: center;
    }
</style>
</body>
</html>