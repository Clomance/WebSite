<HTML>
    <BODY>
        <H1> Проверяем метод GET: </H1>
        <FORM action="<?php print $PHP_SELF ?>" method="post">
            Ваше имя:
            <INPUT type="text" name="userName" maxlength="40">
            <INPUT type="submit" name="obr" value="Проверить">
        </FORM>

        <?php
            $a = ["оскар", "кломанс", "мартин", "admin"];

            $passed = false;
            echo "Проверка: ";
            if (isset($_POST["obr"])){
                $user_name = mb_strtolower(trim($_POST["userName"]));

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