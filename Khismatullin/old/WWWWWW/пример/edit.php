<html>
    <head> <title> Редактирование данных о пользователе </title> </head>
    <body>
        <?php
            $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "be979b4b739385", "67d2bc8a", "heroku_59a01e27452dafc");
            if ($mysqli->connect_errno) {
                echo "Не удалось подключиться к БД";
            }

            $login = $_GET['login'];

            $result = $mysqli->query("SELECT name, password, email, info FROM user WHERE login='$login'");

            if ($result){
                while ($st = $result->fetch_array()) {
                    $name = $st['name'];
                    $password = $st['password'];
                    $email = $st['email'];
                    $info = $st['info'];
                }
            }

            print "<form action='save_edit.php' method='get'>";
            print "Имя: <input name='name' size='50' type='text' value='$name'>";
            print "<br>Логин: <input name='new_login' size='20' type='text' value='$login'>";
            print "<br>Пароль: <input name='password' size='20' type='text' value='$password'>";
            print "<br>Е-mail: <input name='email' size='30' type='text' value='$email'>";
            print "<br>Информация: <textarea name='info' rows='4' cols='40'>$info</textarea>";
            print "<input type='hidden' name='login' size='30' value='$login'>";
            print "<input type='submit' name='' value='Сохранить'>";
            print "</form>";
            print "<p><a href='index.php'> Вернуться к списку пользователей </a>";
        ?>
    </body>
</html>
