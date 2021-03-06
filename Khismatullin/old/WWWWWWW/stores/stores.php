<html>
    <head> <title> Сведения о магазинах </title> </head>

    <h2>Список магазинов:</h2>
    <table border="1">
        <tr>
            <th> Название </th> <th> Адрес </th>
        </tr>
        <?php
            $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "be979b4b739385", "67d2bc8a", "heroku_59a01e27452dafc");
            if ($mysqli->connect_errno) {
                echo "Не удалось подключиться к БД";
            }

            // Запрос на выборку сведений о пользователях
            $result = $mysqli->query("SELECT id, name, url FROM stores");

            $counter=0;
            if ($result){
                while ($row = $result->fetch_array()){
                    $id = $row['id'];
                    $name = $row['name'];
                    $url = $row['url'];
                   

                    $counter++;

                    echo "<tr>";
                    echo "<td>$name</td><td>$url</td>";
                    echo "<td><button style='color: blue' onclick=\"window.location.href='edit.php?id=$id'\">Редактировать</button></td>";
                    echo "<td><button style='color: blue' onclick=\"window.location.href='delete.php?id=$id'\">Удалить</button></td>";
                    echo "</tr>";
                }
            }
            print "</table>";
            print("<p>Всего магазинов: $counter </p>");
        ?>
    <button style='color: blue' onclick="window.location.href='new.php'">Добавить магазин</button></td>
    <button style='color: blue' onclick="window.location.href='../index.php'">Вернуться в меню</button></td>
</html>