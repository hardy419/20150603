<?php
header("Content-type: text/html; charset=utf-8");

$src = 'silver.txt';

$fh = fopen($src, 'r');

$templ = file_get_contents('artwork_sXX.html');

$index = 1;

while ($line = fgets ($fh)) {
    $data = explode ("\t", $line);

    // clone $templ
    $new_filecontents = $templ;

    // Replacement
    $str1=array();
    $str2=array();
    array_push($str1, '##name##', '##name_e##');
    array_push($str2, $data[3], $data[4]);
    array_push($str1, '##school##', '##school_e##');
    array_push($str2, $data[1], $data[2]);
    array_push($str1, '##work##', '##work_e##');
    array_push($str2, $data[6], $data[7]);
    array_push($str1, '##age##');
    array_push($str2, $data[5]);
    array_push($str1, '##id##', '##index##');
    array_push($str2, $data[0], sprintf("%'02d", $index));
    array_push($str1, '##teacher##');
    array_push($str2, '<p class="chi">'.$data[8].'</p><p class="eng">'.$data[9].'</p><p class="chi">&nbsp;</p>##teacher##');
    $new_filecontents = str_replace($str1,$str2,$new_filecontents);
    $i = 10;
    while(isset($data[$i])) {
        $new_filecontents = str_replace('##teacher##','<p class="chi">'.$data[$i].'</p><p class="eng">'.$data[$i+1].'</p><p class="chi">&nbsp;</p>##teacher##',$new_filecontents);
        $i+=2;
    }
    $new_filecontents = str_replace('##teacher##','',$new_filecontents);

    file_put_contents('artwork_s'.sprintf("%'02d", $index).'.html', $new_filecontents);

    echo '<h3>File: artwork_s'.sprintf("%'02d", $index).'.html generated!</h3>';

    $index++;
}

fclose($fh);

echo '<h2>Done!</h2>';
?>