<HTML>
    <BODY>
        <H1> Вариант 1 </H1>
        <FORM action="<?php print $PHP_SELF ?>" method="post">
            <p>Предложение: <INPUT type="text" name="sentence" maxlength="40"></p>
            <p>Слово: <INPUT type="text" name="word" maxlength="40"></p>
            <p><INPUT type="submit" name="delete" value="Удалить"></p>
        </FORM>

        <?php
            if (isset($_POST["delete"])){
                $sentence = trim($_POST["sentence"]);
                $word = trim($_POST["word"]);
                // Мне было лень делать только для удаления слов,
                // так что здесь ещё и удаление всех совпадающих символов
                $sentence = mb_eregi_replace($word,"",$sentence);

                echo $sentence;
            }
        ?>
    </BODY>
</HTML>