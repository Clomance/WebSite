<html>
    <head> <title> Сведения об играх </title> </head>

    <h2>Список игр:</h2>
    <table border="1">
        <tr>
            <th> Название </th> <th> Жанр </th> <th> Разработчик </th>
            <th> Издатель </th> <th> Продано </th> <th> Редактировать </th> <th> Уничтожить </th>
        </tr>
        <?php
            $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "be979b4b739385", "67d2bc8a", "heroku_59a01e27452dafc");
            if ($mysqli->connect_errno) {
                echo "Не удалось подключиться к БД";
            }

            // Запрос на выборку сведений о пользователях
            $result = $mysqli->query("SELECT id, name, genre, developer, publisher, sold FROM games");

            if ($result){
                $counter=0;
                // Для каждой строки из запроса
                while ($row = $result->fetch_array()){
                    $id = $row['id'];
                    $name = $row['name'];
                    $genre = $row['genre'];
                    $developer = $row['developer'];
                    $publisher = $row['publisher'];
                    $sold = $row['sold'];

                    $counter++;

                    echo "<tr>";
                    echo "<td>$name</td><td>$genre</td><td>$developer</td><td>$publisher</td><td>$sold</td>";
                    echo "<td><a href='edit.php?id=$id'>Редактировать</a></td>";
                    echo "<td><a href='delete.php?id=$id'>Удалить</a></td>";
                    echo "</tr>";
                }
                print "</table>";
                print("<p>Всего игр: $counter </p>");
            }

            print("<p> <a href='new.php'> Добавить игру </a> </p>");
        ?>

        <p> <a href='../index.php'> Вернуться в меню </a> </p>
</html>