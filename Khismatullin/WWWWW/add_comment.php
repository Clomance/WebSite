<?php
    $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "be979b4b739385", "67d2bc8a", "heroku_59a01e27452dafc");
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к БД";
    }

    $id = $_GET['id'];
    $description = $_GET['description'];

    $result = $mysqli->query(
        "INSERT INTO comments SET description='$description', news_id='$id'"
    );
?>