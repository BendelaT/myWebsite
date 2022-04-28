<?php

$pdo = new PDO("mysql:host=localhost;port=3306;dbname=mywebsite", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



foreach ($_POST as $key => $value) {

    $statement = $pdo->prepare("DELETE FROM products WHERE id = " . $key);
    $statement->execute();
}
header("Location: index.php");
