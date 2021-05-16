<?php
    $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "be979b4b739385", "67d2bc8a", "heroku_59a01e27452dafc");
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к БД";
    }

    $name = $_GET['name'];
    $description = $_GET['description'];
    $birth = $_GET['birth'];
    $type = $_GET['type'];
    $wings = $_GET['wings'];
    $engine = $_GET['engine'];
    $fuel = $_GET['fuel'];
    $price = $_GET['price'];

    $result = $mysqli->query("
        INSERT INTO starships
        SET name='$name',
        description='$description',
        creation_date='$birth',
        type='$type',
        wings='$wings',
        engine='$engine',
        fuel='$fuel',
        price='$price'
    ");

    if ($result){
        echo "1";
    }
    else{
        echo "0";
    }
?>