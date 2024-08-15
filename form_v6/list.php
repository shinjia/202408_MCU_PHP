<?php

$filename_data = 'data.txt';  // 資料的CSV檔案


// include 'function.__fgetcsv.php'; 
// 讀入資料，逐筆建立成完整陣列的內容
/*
$a_fruits = array();
if((@$handle = fopen($filename_data, 'r')) !== FALSE) {
    while(($row = __fgetcsv($handle)) !== FALSE) {
        $key = $row[0];
        $a_temp = array(
            'name' =>$row[1],
            'descr'=>$row[2],
            'price'=>$row[3],
            'pic'  =>$row[4],
        );
        $a_fruits[$key] = $a_temp;
    }
    fclose($handle);
}
*/


// include 'utility.php';
// $a_fruits = file_to_array($filename_data);

// 另一種寫法
$ary = file($filename_data);
foreach($ary as $value) {
    $row = explode(',', $value);  // 分離字串變成陣列

    $key = $row[0];
    $a_temp = array(
        'name' =>$row[1],
        'descr'=>$row[2],
        'price'=>$row[3],
        'pic'  =>$row[4],
    );
    $a_fruits[$key] = $a_temp;    
}

echo '<pre>';
print_r($a_fruits);
echo '</pre>';


// Debug
echo '<pre>';
print_r($a_fruits);
echo '</pre>';

$data = '';
foreach($a_fruits as $key=>$ary) {
    $name  = $ary['name'];
    $descr = $ary['descr'];
    $price = $ary['price'];
    $pic   = $ary['pic'];

    $data .= <<< HEREDOC
    <tr>
        <td>{$key}</td>
        <td>{$name}</td>
        <td>{$price}</td>
        <td><input type="text" name="amt[]">
            <input type="hidden" name="id[]" value="{$key}">
        </td>
    </tr>
HEREDOC;
}



$html = <<< HEREDOC
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table { border: 1px solid #0000FF; }
        th, td { border: 1px solid red; }
        input[type="text"] { width: 30px; background-color:#FFFFAA; }
    </style>
</head>
<body>
    <h1>商品列表</h1>
    <p>單項商品數量超過10打九折；折扣後總金額超過2000再打八折。</p>
    <form method="post" action="calc.php">
        <table>
            <tr>
                <th>id</th>
                <th>名稱</th>
                <th>單價</th>
                <th>數量</th>
            </tr>
            {$data}
        </table>
        <p><input type="submit" value="計算總額"></p>

    </form>
</body>
</html>
HEREDOC;

echo $html;
?>