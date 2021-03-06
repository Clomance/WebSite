<html>
    <head> <title> Сведения об ключах </title> </head>

    <h2> Список ключей: </h2>
    <table border="1">
        <tr>
            <th> Дата приобретения </th> <th> Дата окончания действия </th> <th> Игра </th>
            <th> Магазин </th> <th> Цена </th> <th> Код активации </th>
        </tr>
        <?php
            $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "be979b4b739385", "67d2bc8a", "heroku_59a01e27452dafc");
            if ($mysqli->connect_errno) {
                echo "Не удалось подключиться к БД";
            }

            // Запрос на выборку сведений о пользователях
            $result = $mysqli->query("SELECT game_keys.id, game_keys.purchase_date, game_keys.expiry_date,
                games.name as game, stores.name as store, game_keys.price, game_keys.key_code FROM game_keys
                LEFT JOIN games ON game_keys.game_id=games.id
                LEFT JOIN stores ON game_keys.store_id=stores.id"
            );

            $counter=0;
            if ($result){
                while ($row = $result->fetch_array()){
                    $id = $row['id'];
                    $purchase_date = $row['purchase_date'];
                    $expiry_date = $row['expiry_date'];
                    $game = $row['game'];
                    $store = $row['store'];
                    $price = $row['price'];
                    $key_code = $row['key_code'];

                    $purchase_date = date('d-m-Y', strtotime($purchase_date));
                    $expiry_date = date('d-m-Y', strtotime($expiry_date));

                    echo "<tr>";
                    echo "<td>$purchase_date</td><td>$expiry_date</td><td>$game</td><td>$store</td><td>$price</td><td>$key_code</td>";
                    echo "<td><button style='color: blue' onclick=\"window.location.href='edit.php?id=$id'\">Редактировать</button></td>";
                    echo "<td><button style='color: blue' onclick=\"window.location.href='delete.php?id=$id'\">Удалить</button></td>";
                    echo "</tr>";

                    $counter++;
                }
            }
            print "</table>";
            print("<p>Всего игр: $counter </p>");
        ?>
    <button style='color: blue' onclick="window.location.href='new.php'">Добавить ключ</button></td>
    <button style='color: blue' onclick="window.location.href='../index.php'">Вернуться в меню</button></td>
</html>