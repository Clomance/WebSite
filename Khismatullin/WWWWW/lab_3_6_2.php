<HTML>
    <BODY>
        <H1> Вариант 2 </H1>
        <FORM action="<?php print $PHP_SELF ?>" method="post">
            <p>Слово 1: <INPUT type="text" name="word1" maxlength="40"></p>
            <p>Слово 2: <INPUT type="text" name="word2" maxlength="40"></p>
            <p><INPUT type="submit" name="check" value="Проверить"></p>
        </FORM>

        <?php
            if (isset($_POST["check"])){
                $word1 = trim($_POST["word1"]);
                $word2 = trim($_POST["word2"]);

                $chars1 = str_split($word1);
                $len = count(str_split($word2));

                $passed = 0;

                for ($c = 0; $c < count($chars1); $c++){
                    if (stripos($word2,$chars1[$c]) === false){
                        break;
                    }
                    $passed++;
                }

                if ($passed >= $len){
                    echo "есть";
                }
                else{
                    echo "нет";
                }
            }
        ?>
    </BODY>
</HTML>