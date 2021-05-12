<?php
    $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "be979b4b739385", "67d2bc8a", "heroku_59a01e27452dafc");
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к БД";
    }

    $loaded = $_GET['loaded'];
    $need_to_load = $_GET['need_to_load'];

    $result = $mysqli->query(
        "SELECT  id, header, description, image_reference
        FROM news ORDER BY id DESC LIMIT $loaded, $need_to_load
        "
    );

    if ($result){
        while ($row = $result->fetch_array()){
            $id = $row['id'];
            $header = $row['header'];
            $description = $row['description'];
            $image_reference = $row['image_reference'];

            echo "<p>";
            echo "<h1>$header</h1>";
            echo "<img width='250px' height='250px' class='leftimg' src='$image_reference'>";
            echo $description;
            echo "</img>";
            echo "<div style='clear:left'></div>";
            echo "<section id='comments_$id'></section>";
            echo "<section id='add_comments_section_$id'></section>";
            echo "<p><input id='comments_button_$id' type='button' value='Открыть комментарии' onclick='upload_comments($id);'></p>";
            echo "</p>";
        }
    }
?>