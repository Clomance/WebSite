<?php
    $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "be979b4b739385", "67d2bc8a", "heroku_59a01e27452dafc");
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к БД";
    }

    $login = $_GET['login'];

    $result = $mysqli->query("DELETE FROM user WHERE login='$login'");

    header("Location: index.php");
    exit;
?>