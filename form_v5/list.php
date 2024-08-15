<?php
 
include 'data.php';   // 引入資料陣列

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