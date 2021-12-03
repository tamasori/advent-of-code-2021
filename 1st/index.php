<?php

$data = file('data.txt');

$count = 0;
for ($i = 0; $i < count($data); $i++) {
    if ($i > 0) {
        if (intval($data[$i]) > intval($data[$i - 1])) {
            $count++;
        }
    }
}
echo $count;
echo "\n>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>\n";
$count = 0;
for ($i = 1; $i < count($data) - 2; $i++) {
    if ((intval($data[$i-1])+intval($data[$i])+intval($data[$i+1])) < (intval($data[$i])+intval($data[$i+1])+intval($data[$i+2]))) {
        $count++;
    }
}
echo $count;