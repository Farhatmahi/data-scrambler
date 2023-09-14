<?php 

function displayKey ($key) {
    global $task;
        printf("value = '%s'", $key);
}

function scambleData ($originalData, $key) {
    $initialKey = 'abcdefghijklmnopqrstuvwxyz1234567890';
    $data = "";
    $originalData = strtolower($originalData);
    $length = strlen($originalData);
    for($i = 0; $i < $length; $i++) {
        $currentChar = $originalData[$i];
        $position = strpos($initialKey, $currentChar);
        if($position !== false) {
            $data .= $key[$position];
        } else { 
            $data .= $currentChar;
        }
    }

    return $data;
}



function decodeData ($originalData, $key) {
    $initialKey = 'abcdefghijklmnopqrstuvwxyz1234567890';
    $data = "";
    $originalData = strtolower($originalData);
    $length = strlen($originalData);
    for($i = 0; $i < $length; $i++) {
        $currentChar = $originalData[$i];
        $position = strpos($key, $currentChar);
        if($position !== false) {
            $data .= $initialKey[$position];
        } else { 
            $data .= $currentChar;
        }
    }

    return $data;
}