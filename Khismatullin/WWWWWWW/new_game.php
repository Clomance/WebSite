<html>
    <head> <title> Добавление новой игры </title> </head>
    <body>
        <H2>Добавление новой игры:</H2>
        <form action="save_new_game.php" metod="get">
            Название: <input name="name" size="50" type="text">
            <br>Жанр: <input name="genre" size="20" type="text">
            <br>Разработчик: <input name="developer" size="20" type="text">
            <br>Издатель: <input name="publisher" size="30" type="text">
            <br>Продажи: <input name="sold" size="30" type="text">

            <?php
                $id = $_GET['id'];
                echo "<input name='id' size='30' type='hidden' value='$id'>";
            ?>

            <p>
                <input name="add" type="submit" value="Добавить">
                <input name="b2" type="reset" value="Очистить">
            </p>
        </form>
        <p> <a href="index.php"> Вернуться к списку игр </a> </p>
    </body>
</html>