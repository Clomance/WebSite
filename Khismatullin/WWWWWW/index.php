<h2>Управление БД</h2>
<ul id="nav"> <!-- Собственные скрипты для просмотра и редактирования БД -->
    <li><a href="commander.php">Коммандер для БД</a>
    <li><a href="bd_edit.php">Редактирование БД</a>
</ul>

<html>
    <head> <title> Сведения о прользователях сайта </title> </head>

    <h2>Список планет:</h2>
    <table border="1">
        <tr>
            <th> Название </th> <th> Созвездие </th> <th> Расстояние до Земли </th>
            <th> Тип </th> <th> Диаметр </th> <th> Редактировать </th> <th> Уничтожить </th>
        </tr>
        <?php
            $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "be979b4b739385", "67d2bc8a", "heroku_59a01e27452dafc");
            if ($mysqli->connect_errno) {
                echo "Не удалось подключиться к БД";
            }

            // Запрос на выборку сведений о пользователях
            $result = $mysqli->query("SELECT name, constellation, distance, type, diameter FROM planets");

            if ($result){
                $counter=0;
                // Для каждой строки из запроса
                while ($row = $result->fetch_array()){
                    $name = $row['name'];
                    $constellation = $row['constellation'];
                    $distance = $row['distance'];
                    $type = $row['type'];
                    $diameter = $row['diameter'];

                    $counter++;

                    echo "<tr>";
                    echo "<td>$name</td><td>$constellation</td><td>$distance</td><td>$type</td><td>$diameter</td>";
                    echo "<td><a href='edit.php?name=$name'>Редактировать</a></td>";
                    echo "<td><a href='delete.php?name=$name'>Удалить</a></td>";
                    echo "</tr>";
                }
                print "</table>";
                print("<p>Всего планет: $counter </p>");
            }

            print("<p> <a href='new.php'> Добавить планету </a> </p>");
        ?>
</html>