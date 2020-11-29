<html>
    <head> <title> Добавление новой ключа </title> </head>
    <body>
        <H2>Добавление новой ключа</H2>
        <form action="save_new.php" method="get">
            Дата приобретения: <input name="purchase_date" size="50" type="date">
            <br>Дата окончания действия: <input name="expiry_date" size="20" type="date">
            <?php
                $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "be979b4b739385", "67d2bc8a", "heroku_59a01e27452dafc");
                if ($mysqli->connect_errno) {
                    echo "Не удалось подключиться к БД";
                }

                // Получение данных об играх
                $result = $mysqli->query("SELECT id, name FROM games");
                echo "<br>Игра: <select name='game_id'>";

                if ($result){
                    while ($row = $result->fetch_array()){
                        $id = $row['id'];
                        $name = $row['name'];

                        echo "<option value='$id'>$name</option>";
                    }
                }
                echo "</select>";

                // Получение данных о магазинах
                $result = $mysqli->query("SELECT id, name FROM stores");
                echo "<br>Магазин: <select name='store_id'>";

                if ($result){
                    while ($row = $result->fetch_array()){
                        $id = $row['id'];
                        $name = $row['name'];

                        echo "<option value='$id'>$name</option>";
                    }
                }
                echo "</select>";
            ?>
            <br>Цена: <input name="price" size="30" type="text">
            <br>Код активации: <input name="key_code" size="30" type="text">
            <p>
                <input name="add" type="submit" value="Добавить">
                <input name="b2" type="reset" value="Очистить">
            </p>
        </form>
        <p><button style='color: blue' onclick="window.location.href='game_keys.php'">Вернуться к списку ключей</button></td></p>
    </body>
</html>