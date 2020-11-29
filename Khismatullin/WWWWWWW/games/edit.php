<html>
    <head> <title> Редактирование данных об игре </title> </head>
    <body>
        <form action='save_edit.php' method='get'>
            <?php
                $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "be979b4b739385", "67d2bc8a", "heroku_59a01e27452dafc");
                if ($mysqli->connect_errno) {
                    echo "Не удалось подключиться к БД";
                }

                $id = $_GET['id'];

                $result = $mysqli->query("SELECT name, genre, developer, publisher, sold FROM games WHERE id='$id'");

                if ($result && $st = $result->fetch_array()){
                    $name = $st['name'];
                    $genre = $st['genre'];
                    $developer = $st['developer'];
                    $publisher = $st['publisher'];
                    $sold = $st['sold'];
                }

                print "Название: <input name='name' size='50' type='text' value='$name'>";
                print "<br>Жанр: <input name='genre' size='20' type='text' value='$genre'>";
                print "<br>Разработчик: <input name='developer' size='20' type='text' value='$developer'>";
                print "<br>Издатель: <input name='publisher' size='30' type='text' value='$publisher'>";
                print "<br>Продано: <input type='text' name='sold' size='20' value='$sold'>";
                print "<input type='hidden' name='id' size='30' value='$id'>";
            ?>
            <p><input type='submit' name='save' value='Сохранить'></p>
        </form>
        <p><button style='color: blue' onclick="window.location.href='games.php'">Вернуться к списку игр</button></td></p>
    </body>
</html>