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
        <a href="index.php?view=shoppingbasket">Shopping basket (<em>0</em>)</a>
    </header>

    <div class="container-fluid">
        <div class="row">
            <aside class="col-sm-2">
                <h2>Menu</h2>
                <ul>
                    <?php foreach($products AS $id => $productItem):?>
                    <li><a href="?product=<?php echo $id?>"><?php echo $productItem->getName()?></a></li>
                    <?php endforeach;?>
                </ul>
            </aside>
            <main class="col-sm-10">
                <h2><?php echo $product->getName() ?></h2>
                <img src="images/<?php echo $product->getImage() ?>" />
                <p><?php echo $product->getDescription() ?></p>

                <br />
                <p>&euro; <?php echo number_format($product->calculatePrice(), 2) ?></p>

                <form method="post">
                    <input type="hidden" name="product" value="<?php $id?>>" />
                    <input type="submit" value="Add to cart" />
                </form>
            </main>
        </div>
    </div>

    <footer class="text-center">&copy; <?php echo date('Y')?> Becode</footer>
</body>
</html>