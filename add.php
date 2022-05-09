<?php

include "mysql_connect.php";


$sku = "";
$name = "";
$price = "";
$size = "";
$weight = "";
$height = "";
$width = "";
$length = "";




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["sku"])) {
        $sku = "";
    } else {
        $sku = $_POST["sku"];
    }
    if (empty($_POST["name"])) {
        $name = "";
    } else {
        $name = $_POST["name"];
    }
    if (empty($_POST["price"])) {
        $price = 0;
    } else {
        $price = $_POST["price"];
    }
    if (empty($_POST["size"])) {
        $size = 0;
    } else {
        $size = $_POST["size"];
    }
    if (empty($_POST["weight"])) {
        $weight = 0;
    } else {
        $weight = $_POST["weight"];
    }
    if (empty($_POST["height"])) {
        $height = 0;
    } else {
        $height = $_POST["height"];
    }
    if (empty($_POST["width"])) {
        $width = 0;
    } else {
        $width = $_POST["width"];
    }
    if (empty($_POST["length"])) {
        $length = 0;
    } else {
        $length = $_POST["length"];
    }



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
            <select onchange="hideDiv(this.value)" name="productType" id="productType" class="form-select">
                <option id="selectedOpt" value="selectedOpt" selected>Type Switcher</option>
                <option value="dvd">DVD-disc</option>
                <option value="book">Book</option>
                <option value="furniture">Furniture</option>
            </select>
        </div>
        <div id="dvd">
            <div class="input-group mb-3">
                <label>Size (MB)</label>
                <input name="size" placeholder="Size" type="number" class="form-control">
            </div>
        </div>
        <div id="book">
            <div class="input-group mb-3">
                <label>Weight (KG)</label>
                <input name="weight" placeholder="Weight" type="number" class="form-control">
            </div>
        </div>
        <div id="furniture" class="input-group mb-3">
            <div>
                <label>Height (CM)</label>
                <input name="height" placeholder="Height" type="number" class="form-control">
            </div>
            <div>
                <label>Width (CM)</label>
                <input name="width" placeholder="Width" type="number" class="form-control">
            </div>
            <div>
                <label>Length (CM)</label>
                <input name="length" placeholder="Length" type="number" class="form-control">
            </div>
        </div>
        <p id="text"></p>

        <div class="add_actions">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="index.php" type="button" class="btn btn-light">Cancel</a>
        </div>

    </form>

    <script>
        function hideDiv(option) {
            if (option == "selectedOpt") {
                $('#text').html("")
            }
            if (option == "dvd") {
                $('#dvd').show()
                $('#text').html("Please, provide disc space in MB")
            } else {
                $('#dvd').hide()
            }
            if (option == "book") {
                $('#book').show()
                $('#text').html("Please, provide weight in KG")
            } else {
                $('#book').hide()
            }
            if (option == "furniture") {
                $('#furniture').show()
                $('#text').html("Please, provide dimensions in HxWxL")

            } else {
                $('#furniture').hide()

            }
        }
    </script>
</body>

</html>