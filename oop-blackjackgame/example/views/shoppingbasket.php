<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>My shop</title>
</head>
<body>
<h1>My shop</h1>

<header class="float-right">
    <a href="shoppingbasket.php">Shopping basket (<em>0</em>)</a>
</header>

<div class="container-fluid">
    <div class="row">
        <aside class="col-sm-2">
            <h2>Menu</h2>
            <ul>
                <li><a href="?product=1">Product name</a></li>
            </ul>
        </aside>
        <main class="col-sm-10">
            <h2>Shopping basket</h2>

            <table class="table table-striped" width="100%">
                <thead>
                    <tr>
                        <th>Product name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                       <td colspan="3" class="text-center">There are no products in your cart</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="2" class="text-right">Total:</th>
                        <th>&euro; 0, 00</th>
                    </tr>
                </tfoot>
            </table>
        </main>
    </div>
</div>

<footer class="text-center">&copy; <?php echo date('Y')?> Becode</footer>
</body>
</html>