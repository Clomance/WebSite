<p> Вариант 1
<p>
<?php
    $N = rand(1,10); // Размер массива

    $a[0] = rand(0,20); // Начальное число
    $a[1] = $a[0];

    for ($c = 2; $c < $N; $c++){
        $a[] = 2 * $a[$c - 1];
    }

    echo $a[0];
    for ($c = 1; $c < $N; $c++){
        echo ", ".$a[$c];
    }
?>