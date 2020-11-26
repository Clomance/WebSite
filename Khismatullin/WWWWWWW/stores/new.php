<html>
    <head> <title> Добавление новой игры </title> </head>
    <body>
        <H2>Добавление новой игры:</H2>
        <form action="save_new.php" metod="get">
            Название: <input name="name" size="50" type="text">
            <br>Адрес: <input name="url" size="20" type="text">

            <p>
                <input name="add" type="submit" value="Добавить">
                <input name="b2" type="reset" value="Очистить">
            </p>
        </form>
        <p> <a href="stores.php"> Вернуться к списку игр </a> </p>
    </body>
</html>