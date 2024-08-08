<?php
// 取得表單傳入資料
$amt_1 = $_POST['amt_1'] ?? 0;
$amt_2 = $_POST['amt_2'] ?? 0;

// 計算總金額
$total = 0;

$msg_1 = '';
if($amt_1>=10) {
    $total += (100 * $amt_1) * 0.9;
    $msg_1 = '**數量折扣**';
}
else {
    $total += (100 * $amt_1);
}


$msg_2 = '';
if($amt_2>=10) {
    $total += (100 * $amt_2) * 0.9;
    $msg_2 = '**數量折扣**';
}
else {
    $total += (100 * $amt_2);
}


// 總金額的優惠
$msg = '';
if($total>=2000) {
    $total = $total * 0.8;
    $msg = '**總額優惠**';
    // $total *= 0.8;
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