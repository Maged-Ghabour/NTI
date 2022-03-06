<?php


$units=160;

/*
$units=1;
$units=60;
*/
  
$first_cost = 3.50;
$second_cost = 4.00;
$third_cost = 6.50;


if($units <= 50) {
    $bill = $units * $first_cost;
    echo($bill);
}
else if($units > 50 && $units <= 150) {
    $bill = $units * $second_cost;
    echo($bill);
}
else{
    $bill = $units * $third_cost;
    echo($bill);
}

?>

