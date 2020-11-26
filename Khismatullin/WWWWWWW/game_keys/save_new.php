<?php
    $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "be979b4b739385", "67d2bc8a", "heroku_59a01e27452dafc");
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к БД";
    }

    $purchase_date = $_GET['purchase_date'];
    $expiry_date = $_GET['expiry_date'];
    $game_id = $_GET['game_id'];
    $store_id = $_GET['store_id'];
    $price = $_GET['price'];
    $key_code = $_GET['key_code'];

    // Выполнение запроса
    $result = $mysqli->query("INSERT INTO game_keys SET purchase_date='$purchase_date', expiry_date='$expiry_date', game_id='$game_id', store_id='$store_id', price='$price', key_code ='$key_code'");

    // если нет ошибок при выполнении запроса
    if ($result){
        print "<p>Вы успешно внесли ключ в базу данных.";
    }
    else{
        print "<p>Ошибка сохранения.";
    }

    print "<p><a href='game_keys.php'> Вернуться к списку ключей </a>";
?>