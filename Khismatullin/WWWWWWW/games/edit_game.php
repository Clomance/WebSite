<html>
    <head> <title> Редактирование данных о планете </title> </head>
    <body>
        <?php
            $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "be979b4b739385", "67d2bc8a", "heroku_59a01e27452dafc");
            if ($mysqli->connect_errno) {
                echo "Не удалось подключиться к БД";
            }

            $id = $_GET['id'];

            $result = $mysqli->query("SELECT name, genre, developer, publisher, sold FROM games WHERE id='$id'");

            if ($result){
                while ($st = $result->fetch_array()) {
                    $name = $st['name'];
                    $genre = $st['genre'];
                    $developer = $st['developer'];
                    $publisher = $st['publisher'];
                    $sold = $st['sold'];
                }
            }

            print "<form action='save_edit_game.php' metod='get'>";
            print "Название: <input name='name' size='50' type='text' value='$name'>";
            print "<br>Созвездие: <input name='genre' size='20' type='text' value='$genre'>";
            print "<br>Расстояние до Земли: <input name='developer' size='20' type='text' value='$developer'>";
            print "<br>Тип: <input name='publisher' size='30' type='text' value='$publisher'>";
            print "<br>Диаметр: <input type='text' name='sold' size='20' value='$sold'>";
            print "<input type='hidden' name='id' size='30' value='$id'>";
            print "<input type='submit' name='save' value='Сохранить'>";
            print "</form>";
            print "<p><a href='games.php'> Вернуться к списку планет </a>";
        ?>
    </body>
</html>