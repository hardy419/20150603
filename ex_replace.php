<?php
header("Content-type: text/html; charset=utf-8");

$files=scandir('.');

foreach($files as $file) if('artwork_m' == substr($file,0,9)) {
    //echo "<h1>$file</h1>";
    $html=file_get_contents($file);

    $str1=array();
    $str2=array();
    //////////////////////////////////////////////////////////////
    // Change contents
    /*array_push($str1, '前備知識');
    array_push($str2, '有向數的乘除運算');
    array_push($str1, '4.1A&nbsp;&nbsp;<?php echo $title; ?>');
    array_push($str2, '1.4&nbsp;&nbsp;<?php echo $title; ?>');
    array_push($str1, '工作紙 4A', 'files/S304C_4A.pdf');
    array_push($str2, '工作紙 1D', 'files/S101C_1D.pdf');
    array_push($str1, '尺規作圖');
    array_push($str2, '1.4D 有向數四則計算');
    array_push($str1, '角平分線');
    array_push($str2, '有向數');*/
    array_push($str1, '</table>');
    array_push($str2, '<tr><td><p class="chi">類別/Category</p><p class="chi">&nbsp;</p></td><td><p class="chi">媒體藝術/Media Art</p><p class="chi">&nbsp;</p></td></tr></table>');
    //////////////////////////////////////////////////////////////

    $f_con=str_replace($str1,$str2,$html);


    echo "<h3>File: {$file} Replaced!!</h3>";

    file_put_contents($file, $f_con);
}

echo '<h2>Done!</h2>';
?>