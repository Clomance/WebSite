<?php
    $mysqli = new mysqli("eu-cdbr-west-03.cleardb.net", "be979b4b739385", "67d2bc8a", "heroku_59a01e27452dafc");
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к БД";
    }

    $result = $mysqli->query("SELECT  name, description, creation_date, type, wings, engine, fuel, price FROM starships");

    $counter = 0;

    if ($result){
        while ($row = $result->fetch_array()){
            $counter++;

            $name = $row['name'];
            $description = $row['description'];
            $birth = $row['creation_date'];
            $type = $row['type'];
            $wings = $row['wings'];
            $engine = $row['engine'];
            $fuel = $row['fuel'];
            $price = $row['price'];

            echo "<section style = background-color:#222>";
            echo "<h2> Космитеческий корабль \"$name\"</h2>";

            // echo "<tbody>";
            // for ($i=0;$i<4;$i++){
            //     echo "<tr>";
            //     for ($d=0;$d<5;$d++){
            //         echo "<td style = background-color:#FFF>";
            //         $cid = $i*5+$d;
            //         $cid2 = $cid+1;
            //         echo "<img id='starship_view_$cid' src='starship_parts/starship_$cid2.png'>";
            //         echo "</td>";
            //     }
            //     echo "</tr>";
            // }
            // echo "</tbody>";

            echo "<div>Описание: $description</div>";

            $date = new DateTime($birth);
            $birth = $date->format('d.m.y');
            echo "<div>Дата создания: $birth</div>";

            if ($type==0){
                echo "<div>Тип: Лёгкий</div>";
            }
            else if ($type==1){
                echo "<div>Тип: Средний</div>";
            }
            else{
                echo "<div>Тип: Тяжёлый</div>";
            }

            if ($wings==0){
                echo "<div>Крылья \"Русский стандарт\"</div>";
            }
            else{
                echo "<div>Крылья \"Американский пирог\"</div>";
            }

            if ($engine==0){
                echo "<div>Двигатель \"Урод\"</div>";
            }
            else{
                echo "<div>Двигатель \"Прокатиииииись\"</div>";
            }
            
            echo "<div>Уровень топлива: $fuel</div>";

            echo "<div>Стоимость: $price</div>";

            echo "</section>";
        }

        if ($counter==0){
            echo "Пока здесь нет космических кораблей";
        }
    }
?>