<html>
    <body>
        <?php
            $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "be979b4b739385", "67d2bc8a", "heroku_59a01e27452dafc");
            if ($mysqli->connect_errno) {
                echo "Не удалось подключиться к БД";
            }

            $old_name = $_GET['name'];

            $new_name = $_GET['new_name'];
            $constellation = $_GET['constellation'];
            $distance = $_GET['distance'];
            $type = $_GET['type'];
            $diameter = $_GET['diameter'];

            $zapros="UPDATE planets SET name='$new_name', constellation='$constellation', distance='$distance', type='$type', diameter='$diameter' WHERE name='$old_name'";

            $result = $mysqli->query($zapros);

            if ($result) {
                echo 'Все сохранено. <a href="index.php"> Вернуться к списку планет </a>';
            }
            else { 
                echo 'Ошибка сохранения. <a href="index.php"> Вернуться к списку планет</a> '; 
            }
        ?>
    </body>
</html>