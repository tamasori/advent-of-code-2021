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