<?php
    $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "be979b4b739385", "67d2bc8a", "heroku_59a01e27452dafc");
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к БД";
    }
    // Строка запроса на добавление записи в таблицу:
    $sql_add = "INSERT INTO user SET login='" . $_GET['login'].
        "', name='" . $_GET['name'].
        "', password='" . $_GET['password'].
        "', email='" . $_GET['email'].
        "', info='" . $_GET['info'] . "'";

    // Выполнение запроса
    $result = $mysqli->query($sql_add);

    // если нет ошибок при выполнении запроса
    if ($result){
        print "<p>Спасибо, вы зарегистрированы в базе данных.";
        print "<p><a href='index.php'> Вернуться к списку
        пользователей </a>";
    }
    else{
        print "Ошибка сохранения. <a href=\"index.php\">
        Вернуться к списку книг </a>";
    }
?>