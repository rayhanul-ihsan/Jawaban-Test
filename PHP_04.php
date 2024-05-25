<?php
function oddNumbersInRange($number1, $number2) {
    $result = array();
    
    if ($number1 % 2 == 0) {
        $number1++;
    }

    for ($i = $number1; $i <= $number2; $i += 2) {
        $result[] = $i;
    }
    
    return $result;
}

$angka1 = 2;
$angka2 = 5;

$output = oddNumbersInRange($angka1, $angka2);
echo "Output = [" . implode(", ", $output) . "]";
?>
