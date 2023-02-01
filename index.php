<?php
$days_quantity = date('t');
$list_days = [];
echo "Год: " . date("Y") .PHP_EOL;
echo "Месяц: " . date("F") . PHP_EOL;
for ($i = 1; $i <= $days_quantity; $i++) {
    $date_i = date("$i-m-Y");
    $date_D = date('D', strtotime($date_i));
    $date_d = date('d', strtotime($date_i));
    $list_days[] = $date_D .  " => " . $date_d ;
//    echo  $date_D .  " => " . $date_d . PHP_EOL;
}

    for ($i = 0; $i < $days_quantity; $i++) {

        $substr = mb_substr($list_days[$i], 0, 3);
        if ($substr === 'Sun' || $substr === 'Sat') {
            echo $list_days[$i] . PHP_EOL;
        } else {

            echo "\033[31m$list_days[$i]\033[0m" . PHP_EOL;

        }
    }