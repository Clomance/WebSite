<?php
    $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "be979b4b739385", "67d2bc8a", "heroku_59a01e27452dafc");
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к БД";
    }

    $result = $mysqli->query(
        "SELECT name, email, message FROM reviews"
    );

    if ($result){
        while ($row = $result->fetch_array()){
            $name = $row['name'];
            $email = $row['email'];
            $review = $row['message'];

            echo "<h2>";
            echo sprintf("%s - %s",$name, $email);
            echo "</h2>";
            echo "<p>";
            echo $review;
            echo "</p>";
        }
    }
?>