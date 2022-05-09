<?php

include "mysql_connect.php";


$statement = $pdo->prepare("SELECT * FROM products");
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>myWebsite</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <header>
        <h1>Product List</h1>
    </header>

    <div class="rectangle"></div>


    <form method="post" action="delete.php" style="display: inline-block;">
        <div class="actions">
            <a href="add.php" class="btn add_btn btn-light">ADD</a>
            <button type="submit" class="btn btn-danger">MASS DELETE</button>
        </div>
        <table class="product">
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td> <input class="delete-checkbox" id="<?php echo $product["id"] ?>" type='checkbox' name='<?php echo $product["id"] ?>'>
                    </td>
                    <td> <?php echo $product["sku"] ?> </td>
                    <td> <?php echo $product["name"] ?></td>
                    <td> <?php echo $product["price"] ?> <span>$</span></td>
                    <td> <?php if (empty($product["size"])) {
                            } else {
                                echo "Size: ", $product["size"], " MB";
                            } ?></td>
                    <td> <?php if (empty($product["weight"])) {
                            } else {
                                echo "Weight: ", $product["weight"], " KG";
                            } ?></td>
                    <td> <?php if (empty($product["height"]) && empty($product["width"]) && empty($product["length"])) {
                            } else {
                                echo "Dimension: ", $product["height"], "x", $product["width"], "x", $product["length"];
                            } ?></td>

                </tr>
            <?php endforeach; ?>
        </table>
    </form>

    <footer class="py-3 my-4">
        <p class="text-center text-muted border-top">Scandiweb Test assignment</p>
    </footer>
</body>

</html>