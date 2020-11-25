<html>
    <body>
        <?php
            $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "be979b4b739385", "67d2bc8a", "heroku_59a01e27452dafc");
            if ($mysqli->connect_errno) {
                echo "Не удалось подключиться к БД";
            }

            $old_login = $_GET['login'];

            $new_login = $_GET['new_login'];
            $name = $_GET['name'];
            $password = $_GET['password'];
            $email = $_GET['email'];
            $info = $_GET['info'];

            $zapros="UPDATE user SET login='$new_login', name='$name', password='$password', email='$email', info='$info' WHERE login='$old_login'";

            $result = $mysqli->query($zapros);

            if ($result) {
                echo 'Все сохранено. <a href="index.php"> Вернуться к списку пользователей </a>';
            }
            else { 
                echo 'Ошибка сохранения. <a href="index.php"> Вернуться к списку пользователей</a> '; 
            }
        ?>
    </body>
</html>