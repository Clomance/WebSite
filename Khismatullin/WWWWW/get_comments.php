<?php
    $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "be979b4b739385", "67d2bc8a", "heroku_59a01e27452dafc");
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к БД";
    }

    $id = $_GET['id'];

    $result = $mysqli->query(
        "SELECT description
        FROM comments WHERE news_id = '$id'
        "
    );

    if ($result){
        while ($row = $result->fetch_array()){
            $description = $row['description'];

            echo "<p>";
            echo $description;
            echo "</p>";
        }
    }
?>