<p> Дата и время:
<p>
<?php
    $d=date("d.m.Y H:i");
    echo($d);
?>
<ul id="nav">
    <li><a href="commander.php">Коммандер для БД</a>
    <li><a href="bd_edit.php">Редактирование БД</a>
</ul>

<html>
    <head> <title> Сведения о прользователях сайта </title> </head>
    <body>
        <?php
            $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "be979b4b739385", "67d2bc8a", "heroku_59a01e27452dafc");
            if ($mysqli->connect_errno) {
                echo "Не удалось подключиться к БД";
            }
        ?>
    </body>

    <h2>Зарегистрированные пользователи:</h2>
    <table border="1">
        <tr>
            <th> Имя </th>
            <th> E-mail </th>
            <th> Редактировать </th>
            <th> Уничтожить </th>
        </tr>
        <?php
            // Запрос на выборку сведений о пользователях
            $result = $mysqli->query("SELECT name, email FROM user");

            if ($result){
                // Для каждой строки из запроса
                while ($row = $result->fetch_array()){
                    echo "<tr>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td><a href='edit.php?id=" . $row['id']
                    . "'>Редактировать</a></td>"; // запуск скрипта для редактирования
                    echo "<td><a href='delete.php?id=" . $row['id']
                    . "'>Удалить</a></td>"; // запуск скрипта для удаления записи
                    echo "</tr>";
                }
                print "</table>";
                // $num_rows = $result->num_rows(); // число записей в таблице БД
                // print("<P>Всего пользователей: $num_rows </p>");
            }
        ?>
    <p> <a href="new.php"> Добавить пользователя </a>
    
</html>
