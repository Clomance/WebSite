<html>
    <head> <title> Редактирование данных о планете </title> </head>
    <body>
        <?php
            $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "be979b4b739385", "67d2bc8a", "heroku_59a01e27452dafc");
            if ($mysqli->connect_errno) {
                echo "Не удалось подключиться к БД";
            }

            $name = $_GET['name'];

            $result = $mysqli->query("SELECT constellation, type, distance, diameter FROM planets WHERE name='$name'");

            if ($result){
                while ($st = $result->fetch_array()) {
                    $constellation = $st['constellation'];
                    $distance = $st['distance'];
                    $type = $st['type'];
                    $diameter = $st['diameter'];
                }
            }

            print "<form action='save_edit.php' method='get'>";
            print "Название: <input name='new_name' size='50' type='text' value='$name'>";
            print "<br>Созвездие: <input name='constellation' size='20' type='text' value='$constellation'>";
            print "<br>Расстояние до Земли: <input name='distance' size='20' type='text' value='$distance'>";
            print "<br>Тип: <input name='type' size='30' type='text' value='$type'>";
            print "<br>Диаметр: <input type='text' name='diameter' size='20' value='$diameter'>";
            print "<input type='hidden' name='name' size='30' value='$name'>";
            print "<input type='submit' name='save' value='Сохранить'>";
            print "</form>";
            print "<p><a href='index.php'> Вернуться к списку планет </a>";
        ?>
    </body>
</html>