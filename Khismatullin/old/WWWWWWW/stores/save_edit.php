<?php
    $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "be979b4b739385", "67d2bc8a", "heroku_59a01e27452dafc");
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к БД";
    }

    $id = $_GET['id'];

    $name = $_GET['name'];
    $url = $_GET['url'];

    $result = $mysqli->query("UPDATE stores SET name='$name', url='$url' WHERE id='$id'");

    header("Location: stores.php");
    exit;
?>