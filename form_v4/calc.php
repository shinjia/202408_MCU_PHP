<?php
// 顯示陣列的值 (debug)
/*
echo '<pre>';
print_r($_POST);
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
$a_price = $_POST['price'] ?? array();
$a_id    = $_POST['id']    ?? array();


// 計算總金額
$count= sizeof($a_id);
$total = 0;
$data = '<ul>';
for($i=0; $i<$count; $i++) {
    $amt   = $a_amt[$i];
    $price = $a_price[$i];
    $id    = $a_id[$i];

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
    <li>id({$id})，單價({$price})，數量({$amt}) {$msg}</li>
HEREDOC;

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