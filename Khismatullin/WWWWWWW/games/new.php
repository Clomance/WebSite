<html>
    <head> <title> Добавление новой игры </title> </head>
    <body>
        <H2>Добавление новой игры:</H2>
        <form action="save_new.php" metod="get">
            Название: <input name="name" size="50" type="text">
            <br>Жанр: <input name="genre" size="20" type="text">
            <br>Разработчик: <input name="developer" size="20" type="text">
            <br>Издатель: <input name="publisher" size="30" type="text">
            <br>Продажи: <input name="sold" size="30" type="text">

            <p>
                <input name="add" type="submit" value="Добавить">
                <input name="b2" type="reset" value="Очистить">
            </p>
        </form>
        <p><button style='color: blue' onclick="window.location.href='games.php'">Вернуться к списку игр</button></td></p>
    </body>
</html>