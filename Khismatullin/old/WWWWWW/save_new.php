<?php
    $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "be979b4b739385", "67d2bc8a", "heroku_59a01e27452dafc");
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к БД";
    }

    $name = $_GET['name'];
    $constellation = $_GET['constellation'];
    $distance = $_GET['distance'];
    $type = $_GET['type'];
    $diameter = $_GET['diameter'];

    // Выполнение запроса
    $result = $mysqli->query("INSERT INTO planets SET name='$name', constellation='$constellation', distance='$distance', type='$type',  diameter ='$diameter'");

    // если нет ошибок при выполнении запроса
    if ($result){
        print "<p>Вы успешно внесли планету в базе данных.";
        print "<p><a href='index.php'> Вернуться к списку планет </a>";
    }
    else{
        print "Ошибка сохранения. <a href='index.php'> Вернуться к списку планет </a>";
    }
?>