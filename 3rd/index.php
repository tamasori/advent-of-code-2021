<?php

$data = file('data.txt');
$calculatePersistence = array();
$gammaBinary = "";
$epsylonBinary = "";
for ($i = 0; $i < strlen(trim($data[0])); $i++) {
    $calculatePersistence[$i] = array(0 => 0, 1 => 0);
}

foreach ($data as $binary){
    $binary = str_split(trim($binary));
    for ($i = 0; $i < count($binary); $i++) {
        $calculatePersistence[$i][$binary[$i]]++;
    }
}

foreach ($calculatePersistence as $key => $value) {
    if($value[0] > $value[1]){
        $gammaBinary .= "0";
        $epsylonBinary .= "1";
    } else {
        $gammaBinary .= "1";
        $epsylonBinary .= "0";
    }
}
echo bindec($epsylonBinary) * bindec($gammaBinary);