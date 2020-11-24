<HTML>
    <BODY>
    <meta charset = "UTF-8">
        <H1> Проверка логина: </H1>
        <FORM action="<?php print $PHP_SELF ?>" method="post">
            Ваше имя:
            <INPUT type="text" name="userName" maxlength="40">
            <INPUT type="submit" name="obr" value="Проверить">
        </FORM>

        <?php
            $a = ["Оскар", "Стас", "Мартин", "admin"];

            $passed = false;
            if (isset($_POST["obr"])){
                $user_name = trim($_POST["userName"]);

                for ($c = 0; $c < count($a); $c++){
                    if ($user_name == $a[$c]){
                        echo "Здравствуйте, $a[$c]!";
                        $passed = true;
                        break;
                    }
                }

                if (!$passed){
                    echo "Ты не пройдёшь!";
                }
            }
        ?>
    </BODY>
</HTML>