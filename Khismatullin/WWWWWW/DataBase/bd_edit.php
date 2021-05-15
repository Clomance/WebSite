<html>
    <head> <title> Сведения о базе данных </title> </head>
    <h2> Таблицы </h2>
    <table border = '1' cellspacing = '0'>
        <tr>
            <th>Таблицы</th>
            <th>Поля</th>
            <th>Типы</th>
            <th>Null</th>
            <th>Ключи</th>
            <th>По умочанию</th>
            <th>Дополнительно</th>
            <th>Редактировать</th>
            <th>Удалить</th>
        </tr>
        <?php
            $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "be979b4b739385", "67d2bc8a", "heroku_59a01e27452dafc");
            if ($mysqli->connect_errno) {
                echo "Не удалось подключиться к БД";
            }

            $result_tables = $mysqli->query("SHOW TABLES");

            if ($result_tables){
                while ($row = $result_tables->fetch_array()){
                    $table_name = $row[0];

                    echo "<tr> <th colspan = '1'>$table_name</th> </tr>";

                    $result_columns = $mysqli->query("SHOW COLUMNS FROM $table_name");

                    if ($result_columns){
                        while($row = $result_columns->fetch_assoc()){
                            $field = $row['Field'];
                            $type = $row['Type'];
                            $null = $row['Null'];
                            $key = $row['Key'];
                            $default = $row['Default'];
                            $extra = $row['Extra'];

                            echo "<tr> <th></th> <th>$field</th> <th>$type</th> <th>$null</th> <th>$key</th> <th>$default</th> <th>$extra</th> <th></th> <th></th> </tr> ";
                        }
                    }
                }
            }
        ?>
    </table>

    <?php
        // if (isset($_POST["add"])){
        //     $table_name = trim($_POST["tableName"]);
        //     if (!empty($table_name)){
        //             // Удаление таблицы из БД
        //         if (!$mysqli->query("DROP TABLE IF EXISTS $table_name") || !$mysqli->query("CREATE TABLE $table_name(id INT)")){
        //             echo "Не удалось создать таблицу";
        //         }
        //         else{
        //             // Удаление таблицы из массива
        //             $tables = array_diff($tables,array($table_name));
        //             $tables[] = $table_name;
        //         }
        //     }
        // }
        // else{
        //     for ($i = 0; $i < count($tables); $i++){
        //         // Название изменяемой таблицы
        //         $table_name = $tables[$i];
        //         // Удаление таблицы
        //         if (isset($_POST["delete_table_$i"])){
        //             if (!$mysqli->query("DROP TABLE IF EXISTS $table_name")){
        //                 echo "Не удалось удалить таблицу";
        //             }
        //             else{
        //                 $tables = array_diff($tables,array($table_name));
        //             }
        //         }
        //         else if (isset($_POST["add_field_$i"])){ // Добаление поля
        //             // $field_name = trim($_POST["fieldName$i"]);
        //             // if (!empty($field_name)){
        //             //     if (!$mysqli->query("INSERT INTO $table_name(id) VALUE()")){
        //             //         echo "Не удалось добавить";
        //             //     }
        //             // }
        //         }
        //         else{
        //             for ($r = 0; $r < count($table_fields); $r++){
        //                 if (isset($_POST["delete_field_$i.$r"])){

        //                     $field_name = $table_fields[$i][$r];
        //                     if (!empty($field_name)){
        //                         if (!$mysqli->query("ALTER TABLE $table_name DROP COLUMN $field_name")){
        //                             echo "Не удалось удалить";
        //                         }
        //                     }
        //                     break;
        //                 }
                        
        //             }
        //         }
        //     }
        // }
    ?>


    <p> <a href='../index.php'> Вернуться в меню </a> </p>
</html>