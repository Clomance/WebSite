<?php
    $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "be979b4b739385", "67d2bc8a", "heroku_59a01e27452dafc");
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к БД";
    }

    $name = $_GET['name'];
    $url = $_GET['url'];

    // Выполнение запроса
    $result = $mysqli->query("INSERT INTO stores SET name='$name', url='$url'");

    // если нет ошибок при выполнении запроса
    if ($result){
        print "<p>Вы успешно внесли игру в базу данных.";
    }
    else{
        echo "<p>Не удалось выполнить комманду: (" . $mysqli->errno . ") " . $mysqli->error;
        print "<p>Ошибка сохранения.";
    }

    print "<p><a href='stores.php'> Вернуться к списку магазинов. </a>";
?>