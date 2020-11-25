<html>
    <head> <title> Добавление новой планеты </title> </head>
    <body>
        <H2>Добавление новой планеты:</H2>
        <form action="save_new.php" metod="get">
            Название: <input name="name" size="50" type="text">
            <br>Созвездие: <input name="constellation" size="20" type="text">
            <br>Расстояние до Земли: <input name="distance" size="20" type="text">
            <br>Тип: <input name="type" size="30" type="text">
            <br>Диаметр: <input name="diameter" size="30" type="text">
            <p>
                <input name="add" type="submit" value="Добавить">
                <input name="b2" type="reset" value="Очистить">
            </p>
        </form>
        <p> <a href="index.php"> Вернуться к списку планет </a> </p>
    </body>
</html>