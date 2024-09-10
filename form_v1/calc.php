<?php
// 取得表單傳入資料
$amt_1 = $_POST['amt_1'] ?? 0;
$amt_2 = $_POST['amt_2'] ?? 0;

// 因為表單傳入一定都是文字型態
$amt_1 = intval($amt_1);  // 強制轉為數值(整數)
$amt_2 = intval($amt_2);

// 計算總金額
$total = 0;
$total += 100 * $amt_1;
$total +=  80 * $amt_2;


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
        <li>蘋果，單價100，數量 {$amt_1}</li>
        <li>香蕉，單價80，數量 {$amt_2}</li>
    </ul>
    <p>總額：{$total}</p>
</body>
</html>
HEREDOC;

echo $html;
?>