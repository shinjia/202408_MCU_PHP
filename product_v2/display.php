<?php

// 多維陣列，完整的表示資料
$a_fruits = array(
    1=>array(
        'name'=>'蘋果',
        'descr'=>'蘋果是一種廣受歡迎的水果',
        'pic'=>'apple.png'
    ), 
    2=>array(
        'name'=>'香蕉',
        'descr'=>'香蕉是一種熱帶水果。',
        'pic'=>'banana.png'
    ), 
    3=>array(
        'name'=>'鳳梨',
        'descr'=>'鳳梨是一種熱帶水果，原產於南美洲',
        'pic'=>'pineapple.png'
    )
);



$id = $_GET['id'] ?? 'x';

// 取出指定的項目
$name  = $a_fruits[$id]['name'];
$descr = $a_fruits[$id]['descr'];
$pic   = $a_fruits[$id]['pic'];

// 錯誤處理
if(!isset($a_fruits[$id])) {
    $name  = 'xxx';
    $descr = 'xxx';
    $pic   = 'xxx';
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
    <p>[<a href="list.php">回清單頁</a>]</p>
    <h1>{$name}</h1>
    <p>{$descr}</p>
    <p><img src="images/{$pic}"></p>
    <hr>
    <p>id: {$id}</p>
</body>
</html>
HEREDOC;

echo $html;
?>