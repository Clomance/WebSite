<p> Число e равно …:
<p>
<?php
    define('NUM_E',2.71828);
    $num_e1=NUM_E;
    settype($num_e1,'boolean');
    print('$num_e1 = '.$num_e1.' - '.gettype($num_e1));
?>  