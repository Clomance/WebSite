<html>
    <head> <title> Редактирование данных о магазине </title> </head>
    <body>
        <form action='save_edit.php' metod='get'>
            <?php
                $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "be979b4b739385", "67d2bc8a", "heroku_59a01e27452dafc");
                if ($mysqli->connect_errno) {
                    echo "Не удалось подключиться к БД";
                }

                $id = $_GET['id'];

                $result = $mysqli->query("SELECT name, url FROM stores WHERE id='$id'");

                if ($result){
                    while ($st = $result->fetch_array()) {
                        $name = $st['name'];
                        $url = $st['url'];
                    }
                }

                print "Название: <input name='name' size='50' type='text' value='$name'>";
                print "<br>URL: <input name='url' size='20' type='text' value='$url'>";
                print "<input type='hidden' name='id' size='30' value='$id'>";
            ?>
            <p><input type='submit' name='save' value='Сохранить'></p>
        </form>
        <p><button style='color: blue' onclick="window.location.href='stores.php'">Вернуться к списку магазинов</button></td></p>
    </body>
</html>