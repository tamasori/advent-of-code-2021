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
echo "\n>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>\n";
$oxygenData = $co2Data = $data;
$helper = 0;
$helperArray = [];
$counter = [
    1 => 0,
    0 => 0,
];
do{
    foreach ($oxygenData as $oData){
        $counter[trim($oData)[$helper]]++;
    }
    foreach ($oxygenData as $oData){
        if($oData[$helper] == ($counter[0] > $counter[1] ? 0 : 1)){
            $helperArray[] = $oData;
        }
    }
    $oxygenData = $helperArray;
    $helperArray = [];
    $counter = [
        1 => 0,
        0 => 0,
    ];
    $helper++;
} while(count($oxygenData) > 1);

$helper = 0;
$helperArray = [];
$counter = [
    1 => 0,
    0 => 0,
];
do{
    foreach ($co2Data as $oData){
        $counter[trim($oData)[$helper]]++;
    }
    foreach ($co2Data as $oData){
        if($oData[$helper] == ($counter[0] > $counter[1] ? 1 : 0)){
            $helperArray[] = $oData;
        }
    }
    $co2Data = $helperArray;
    $helperArray = [];
    $counter = [
        1 => 0,
        0 => 0,
    ];
    $helper++;
} while(count($co2Data) > 1);
echo bindec($oxygenData[0]) * bindec($co2Data[0]);