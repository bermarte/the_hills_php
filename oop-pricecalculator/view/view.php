<?php


//require 'application/controllers/home.php';
require("../model/error_report.php");

require '../controller/controller.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>price calculator</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">
    <!-- views -->
    <form action="#" method="get">
        <div class="form-group">
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                    <?php
                    echo "<div class = \"text-center\">\n";
                    require 'view_products.php';
                    echo "</div>";
                    ?>
                    </div>
                    <div class="col-sm">
                    <?php
                    echo "<div class = \"text-center\">\n";
                    require 'view_customers.php';
                    echo "</div>";
                    ?>
                    </div>
                </div>
            </div>
        </div>
    <input type="submit" name="submit" value="Get Selected Values" class="btn btn-info">
    <input type="submit" name="categories" value="Get Categories" class="btn btn-info">
    </form>
    <div class="mt-3"></div>
    <div>
        <h2> <span class="badge badge-primary">select a product and a customer or view the categories</span></h2>

    </div>
    <?php
    if (isset($show_query)){
        if ($show_query === true){
            echo "<hr>";
            echo "<h2> <span class=\"badge badge-secondary\">your selection</span></h2>";
            //first column: product
            echo "
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-sm\">";
                    echo "<p>";
                    echo "product-id: <strong>".$objprod->getId()."</strong><br>";
                    echo "product: <strong>".$objprod->getName()."</strong><br>";
                    echo "description: <strong>".$objprod->getDescription()."</strong><br>";
                    echo "product-price: <strong>".$objprod->getPrice()."</strong><br>";
                    echo "</p>";
                    echo "
                     </div>
               ";

            //second column: customer
            echo "
                    <div class=\"col-sm\">";
                    echo "<p>";
                    echo "customer-id: <strong>".$objcustomer->getId()."</strong><br>";
                    echo "name: <strong>".$objcustomer->getName()."</strong><br>";
                    echo "group-id: <strong>".$objcustomer->getGroupId()."</strong><br>";
                    echo "</p>";
                    echo "
                    </div>";
            //third column: groups
            echo "
                    <div class=\"col-sm\">";
                    echo "<p>";

                    echo "price with discount applied: <strong>";
                    echo $return."</strong><br>";
                    echo "</p>";
                    echo "
                            </div>
                           </div>
            </div>";

        }
    }
    ?>

</div>
</body>