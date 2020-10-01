<p> Вариант 1 </p>

<?php
    $x=rand(1,1000);
    print("Число $x");

    print("<p> Его делители: 1, ");

    for ($c=2;$c<$x;$c++){
        if ($x%$c==0){
            print("$c, ");
        }
    }

    print("$x </p>");
?>