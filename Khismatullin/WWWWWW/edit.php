<html>
    <head> <title> Редактирование данных о пользователе </title> </head>
    <body>
        <?php
            $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "be979b4b739385", "67d2bc8a", "heroku_59a01e27452dafc");
            if ($mysqli->connect_errno) {
                echo "Не удалось подключиться к БД";
            }
    
            $rows=mysql_query("SELECT user_name, user_login,
            user_password, user_e_mail, user_info FROM user WHERE
            id_user=".$_GET['id_user']);
            while ($st = mysql_fetch_array($rows)) {
            $id=$_GET['id_user'];
            $name = $st['user_name'];
            $login = $st['user_login'];
            $password = $st['user_password'];
            $e_mail = $st['user_e_mail'];
            $info = $st['user_info'];
            }
            print "<form action='save_edit.php' metod='get'>";
            print "Имя: <input name='name' size='50' type='text'
            value='".$name."'>";
            print "<br>Логин: <input name='login' size='20' type='text'
            value='".$login."'>";
            print "<br>Пароль: <input name='password' size='20' type='text'
            value='".$password."'>";
            print "<br>Е-mail: <input name='e_mail' size='30' type='text'
            value='".$e_mail."'>";
            print "<br>Информация: <textarea name='info' rows='4'
            cols='40'>".$info."</textarea>";
            print "<input type='hidden' name='id' value='".$id."'> <br>";
            print "<input type='submit' name='' value='Сохранить'>";
            print "</form>";
            print "<p><a href=\"index.php\"> Вернуться к списку
            пользователей </a>";
        ?>
    </body>
</html>
