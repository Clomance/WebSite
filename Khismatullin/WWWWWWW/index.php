<h2>Управление БД</h2>
<ul id="nav"> <!-- Собственные скрипты для просмотра и редактирования БД -->
    <li><a href="../DataBase/commander.php">Коммандер для БД</a>
    <li><a href="../DataBase/bd_edit.php">Редактирование БД</a>
</ul>

<!-- 
    Игры (id, Название, жанр, разработчик, издатель, объем продаж)
    7.1. Добавить таблицу Цифровые магазины (id, название, url) и возможность
    добавлять/удалять/редактировать ее записи;
    7.2. Добавить таблицу Цифровые ключи (id, дата приобретения, дата окончания, id игры,
    id цифрового магазина, стоимость, ключ) и возможность
    добавлять/удалять/редактировать ее записи. Поля id игры и id цифрового магазина
    являются внешними ключами. При этом в одном Цифровом магазине может быть
    приобретено несколько цифровых ключей на одну и ту же игру.
    7.3. При удалении игры удаляются все ее цифровые ключи.
    7.4. При удалении цифрового магазина удаляются все цифровые ключи из этого магазина.
-->

<html>
    <head> <title> Сведения о прользователях сайта </title> </head>

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
                    echo "<td><a href='edit_game.php?id=$id'>Редактировать</a></td>";
                    echo "<td><a href='delete_game.php?id=$id'>Удалить</a></td>";
                    echo "</tr>";
                }
                print "</table>";
                print("<p>Всего игр: $counter </p>");
            }

            print("<p> <a href='new_game.php?id=$counter'> Добавить игру </a> </p>");
        ?>
</html>