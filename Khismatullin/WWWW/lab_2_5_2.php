<p> Вариант 2
<p> 
<?php
    function F($u, $t){
        if ($u >= 0){
            return $u + 2 * $t;
        }
        else if(-1 < $u){
            return $u + $t;
        }
        else{
            return $u * $u + 2 * $t - 1;
        }
    }

    $a = rand(-10, 10);
    $b = rand(-10, 10);

    echo "<p> Аргумент A = ".$a;
    echo "<p> Аргумент B = ".$b;

    $z = F($a, $b * $b - $a) + F($a, $b * $b);

    echo "<p> Результат = ".$z;
?>