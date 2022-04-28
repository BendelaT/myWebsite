<?php

$pdo = new PDO("mysql:host=localhost;port=3306;dbname=mywebsite", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$sku = "";
$name = "";
$price = "";
$size = "";
$weight = "";
$height = "";
$width = "";
$length = "";



if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $sku = $_POST["sku"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $size = $_POST["size"];
    $weight = $_POST["weight"];
    $height = $_POST["height"];
    $width = $_POST["width"];
    $length = $_POST["length"];



    $statement = $pdo->prepare(
        "INSERT INTO products (sku, name, price, size, weight, height, width, length)
VALUE (:sku, :name, :price, :size, :weight, :height, :width, :length)"
    );
    $statement->bindValue(":sku", $sku);
    $statement->bindValue(":name", $name);
    $statement->bindValue(":price", $price);
    $statement->bindValue(":size", $size);
    $statement->bindValue(":weight", $weight);
    $statement->bindValue(":height", $height);
    $statement->bindValue(":width", $width);
    $statement->bindValue(":length", $length);



    $statement->execute();
    header("Location: index.php");
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>myWebsite</title>
    <link rel="stylesheet" href="add_style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="jquery.js"></script>
</head>

<body>
    <header>
        <h1>Product Add</h1>
    </header>
    <div class="rectangle"></div>
    <form action="" method="post">
        <div class="form_group">
            <label>SKU</label>
            <input class="form-control top_input" type="text" name="sku">
        </div>
        <div class="form_group">
            <label>Name</label>
            <input class="form-control top_input" type="text" name="name">
        </div>
        <div class="form_group">
            <label>Price ($)</label>
            <input class="form-control top_input" type="number" name="price">
        </div>
        <div class="form_group type_switcher">
            <label>Type Switcher</label>
            <select oninput="myFunc()" name="typeSwitcher" id="productType" class="form-select" aria-label="Default select example">
                <option id="selectedOpt" selected>Type Switcher</option>
                <option value="dvd">DVD-disc</option>
                <option value="book">Book</option>
                <option value="furniture">Furniture</option>
            </select>
        </div>
        <div id="switched" class="form_group switched_group">
            <div id="size_container">
                <label>Size (MB): </label>
                <input class="form-control" placeholder="Size" id="size" type="number" name="size">
            </div>
            <div id="weight_container">
                <label>Weight (KG)</label>
                <input class="form-control" placeholder="Weight" id="weight" type="number" name="weight">
            </div>
            <div id="height_container">
                <label>Height (CM)</label>
                <input class="form-control" placeholder="Height" id="height" type="number" name="height">
            </div>
            <div id="width_container">
                <label>Width (CM)</label>
                <input class="form-control" placeholder="Width" id="width" type="number" name="width">
            </div>
            <div id="length_container">
                <label>Length (CM)</label>
                <input class="form-control" placeholder="Length" id="length" type="number" name="length">
            </div>
        </div>
        <p id="text"></p>

        <div class="add_actions">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="index.php" type="button" class="btn btn-light">Cancel</a>
        </div>

    </form>


    <script src="add.js"></script>

</body>

</html>