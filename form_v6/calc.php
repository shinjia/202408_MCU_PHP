<?php
// 顯示陣列的值 (debug)
/*
echo '<pre>';
print_r($_POST);
echo '</pre>';
*/

$filename_data = 'data.txt';  // 資料的CSV檔案

include 'utility.php';
$a_fruits = file_to_array($filename_data);

// Debug
/*
echo '<pre>';
print_r($a_fruits);
echo '</pre>';
*/

// 定義常數：數量折扣
$amt_big = 10;
$discount = 0.9;
// 定義常數：總額優惠
$total_limit = 2000;
$total_discount = 0.8;

// 取得表單傳入資料
$a_amt   = $_POST['amt']   ?? array();
$a_id    = $_POST['id']    ?? array();

// 計算總金額
$count= sizeof($a_id);
$total = 0;
$data = '<ul>';
for($i=0; $i<$count; $i++) {
    $amt   = intval($a_amt[$i]);
    $id    = $a_id[$i];
    
    // 僅針對有數量的來處理
    if($amt>0) {
        // 從定義檔內取得資料
        $name  = $a_fruits[$id]['name']; // 名稱
        $price = $a_fruits[$id]['price'];  // 單價

        // $total += ($amt * $price);

        $msg = '';  // 顯示在每項商品後面的訊息
        if($amt>=$amt_big) {
            $total += ($price * $amt) * $discount;
            $msg = '**數量折扣**';
        }
        else {
            $total += ($price * $amt);
        }

        $data .= <<< HEREDOC
        <li>id({$id})，{$name}，單價({$price})，數量({$amt}) {$msg}</li>
HEREDOC;
    }
}
$data .= '</ul>';


// 總金額的優惠
$msg = '';
if($total>=$total_limit) {
    $total = $total * $total_discount;
    $msg = '**總額優惠**';
}


$html = <<< HEREDOC
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>商品金額計算</h1>
    {$data}
    <p>總額：{$total} {$msg}</p>
</body>
</html>
HEREDOC;

echo $html;
?>