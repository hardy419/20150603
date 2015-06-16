<?php
header("Content-type: text/html; charset=utf-8");

$src = 'silver.txt';

$file = 'silver_prize.html';

$fh = fopen($src, 'r');

$list_unit = file_get_contents('list_unit.txt');
$list_templ = file_get_contents('list_templ.txt');

$index = 1;

while ($line = fgets ($fh)) {
    $data = explode ("\t", $line);

    // clone $list_unit
    $new_unit = $list_unit;

    // Replacement
    $str1=array();
    $str2=array();
    array_push($str1, '##name##', '##name_e##');
    array_push($str2, $data[3], $data[4]);
    array_push($str1, '##school##', '##school_e##');
    array_push($str2, $data[1], $data[2]);
    array_push($str1, '##work##', '##work_e##');
    array_push($str2, $data[6], $data[7]);
    array_push($str1, '##id##', '##index##');
    array_push($str2, $data[0], sprintf("%'02d", $index));

    $new_unit = str_replace($str1,$str2,$new_unit);

    $list_templ = str_replace('##list_unit##', "{$new_unit}##list_unit##", $list_templ);

    print_r ($data);

    $index++;
}

$list_templ = str_replace('##list_unit##', '', $list_templ);

file_put_contents($file, $list_templ);

fclose($fh);

echo '<h2>Done!</h2>';
?>