<?php

include "mysql_connect.php";




foreach ($_POST as $key => $value) {

    $statement = $pdo->prepare("DELETE FROM products WHERE id = " . $key);
    $statement->execute();
}
header("Location: index.php");
