<html>
    <head> <title> Редактирование данных о ключе </title> </head>
    <body>
        <form action='save_edit.php' metod='get'>
            <?php
                $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "be979b4b739385", "67d2bc8a", "heroku_59a01e27452dafc");
                if ($mysqli->connect_errno) {
                    echo "Не удалось подключиться к БД";
                }

                $key_id = $_GET['id'];

                $result = $mysqli->query("SELECT game_keys.id,
                    game_keys.purchase_date, game_keys.expiry_date,
                    games.name as game_name, games.id as game_id,
                    stores.name as store_name, stores.id as store_id,
                    game_keys.price, game_keys.key_code FROM game_keys
                    LEFT JOIN games ON game_keys.game_id=games.id
                    LEFT JOIN stores ON game_keys.store_id=stores.id
                    WHERE game_keys.id=$key_id"
                );

                if ($result && $st = $result->fetch_array()){
                    $purchase_date = $st['purchase_date'];
                    $expiry_date = $st['expiry_date'];
                    $game_name = $st['game_name'];
                    $game_id = $st['game_id'];
                    $store_name = $st['store_name'];
                    $store_id = $st['store_id'];
                    $price = $st['price'];
                    $key_code = $st['key_code'];
                }

                // Создание формы
                print "Дата приобретения: <input name='purchase_date' size='50' type='date' value='$purchase_date'>";
                print "Дата окончания действия: <input name='expiry_date' size='50' type='date' value='$expiry_date'>";

                // Получение данных об играх
                $result = $mysqli->query("SELECT id, name FROM games WHERE id<>$game_id");
                echo "<br>Игра: <select name='game_id'>";
                echo "<option selected value='$game_id'>$game_name</option>";

                if ($result){
                    // Для каждой строки из запроса
                    while ($row = $result->fetch_array()){
                        $id = $row['id'];
                        $name = $row['name'];

                        echo "<option value='$id'>$name</option>";
                    }
                }
                echo "</select>";

                $result = $mysqli->query("SELECT id, name FROM stores WHERE id<>$store_id");
                echo "<br>Магазин: <select name='store_id'>";
                echo "<option selected value='$store_id'>$store_name</option>";

                if ($result){
                    // Для каждой строки из запроса
                    while ($row = $result->fetch_array()){
                        $id = $row['id'];
                        $name = $row['name'];

                        echo "<option value='$id'>$name</option>";
                    }
                }
                echo "</select>";

                print "<br>Цена: <input name='price' size='30' type='text' value='$price'>";
                print "<br>Код активации: <input type='text' name='key_code' size='20' value='$key_code'>";
                print "<input type='hidden' name='id' size='30' value='$key_id'>";
            ?>
            <p><input type='submit' name='save' value='Сохранить'></p>
        </form>
        <p><button style='color: blue' onclick="window.location.href='game_keys.php'">Вернуться к списку ключей</button></td></p>
    </body>
</html>