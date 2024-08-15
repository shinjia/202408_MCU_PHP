<?php

include 'function.__fgetcsv.php'; 

function file_to_array($_filename) {
    // 讀入資料，逐筆建立成完整陣列的內容
    $ary = array();
    if((@$handle = fopen($_filename, 'r')) !== FALSE) {
        while(($row = __fgetcsv($handle)) !== FALSE) {
            $key = $row[0];
            $a_temp = array(
                'name' =>$row[1],
                'descr'=>$row[2],
                'price'=>$row[3],
                'pic'  =>$row[4],
            );
            $ary[$key] = $a_temp;
        }
        fclose($handle);
    }
    return $ary;
}

?>