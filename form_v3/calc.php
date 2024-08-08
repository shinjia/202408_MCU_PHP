<?php
// 顯示陣列的值 (debug)
/*
echo '<pre>';
print_r($_POST);
echo '</pre>';
*/

// 取得表單傳入資料
$amt_1 = $_POST['amt_1'] ?? 0;
$amt_2 = $_POST['amt_2'] ?? 0;
$price_1 = $_POST['price_1'] ?? 0;
$price_2 = $_POST['price_2'] ?? 0;

// 定義常數：數量折扣
$amt_big = 10;
$discount = 0.9;
// 定義常數：總額優惠
$total_limit = 2000;
$total_discount = 0.8;


// 計算總金額
$total = 0;

$msg_1 = '';
if($amt_1>=$amt_big) {
    $total += ($price_1 * $amt_1) * $discount;
    $msg_1 = '**數量折扣**';
}
else {
    $total += ($price_1 * $amt_1);
}


$msg_2 = '';
if($amt_2>=$amt_big) {
    $total += ($price_2 * $amt_2) * $discount;
    $msg_2 = '**數量折扣**';
}
else {
    $total += ($price_2 * $amt_2);
}


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
    <ul>
        <li>蘋果，單價100，數量 {$amt_1} {$msg_1}</li>
        <li>香蕉，單價80，數量 {$amt_2} {$msg_2}</li>
    </ul>
    <p>總額：{$total} {$msg}</p>
</body>
</html>
HEREDOC;

echo $html;
?>