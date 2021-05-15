<?php
    $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "be979b4b739385", "67d2bc8a", "heroku_59a01e27452dafc");
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к БД";
    }

    $name = $_GET['name'];
    $email = $_GET['email'];
    $review = $_GET['review'];

    $result = $mysqli->query(
        "INSERT INTO reviews SET name='$name', email='$email', message='$review'"
    );
?>