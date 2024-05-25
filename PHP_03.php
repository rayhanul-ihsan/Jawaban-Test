<?php
function findDuplicates($array) {
    $result = array();
    $counts = array();
    
    foreach ($array as $value) {
        if (isset($counts[$value])) {
            $counts[$value]++;
        } else {
            $counts[$value] = 1;
        }
    }
    
    foreach ($counts as $key => $count) {
        if ($count > 1) {
            $result[] = $key;
        }
    }
    
    return $result;
}

$array = array(790, 483, 281, 224, 483, 60, 698, 483, 790, 168);
$duplicates = findDuplicates($array);

echo "Angka yang muncul lebih dari 1 kali: ";
foreach ($duplicates as $value) {
    echo $value . " ";
}
?>
