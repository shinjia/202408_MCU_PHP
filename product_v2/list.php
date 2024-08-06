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
    ),
    4=>array(
        'name'=>'櫻桃',
        'descr'=>'櫻桃是一種小巧、圓潤的水果',
        'pic'=>'cherry.png'
    )
);


$data = '';
foreach($a_fruits as $key=>$a_one) {
    $name  = $a_one['name'];
    $descr = $a_one['descr'];
    $pic   = $a_one['pic'];
    /*
    $name  = $a_fruits[$key]['name'];
    $descr = $a_fruits[$key]['descr'];
    $pic   = $a_fruits[$key]['pic'];
    */

    $data .= <<< HEREDOC
    <li><a href="display.php?id={$key}">{$name}</a></li>
HEREDOC;
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
    <h1>產品清單</h1>
    <ul>
{$data}
    </ul>

</body>
</html>
HEREDOC;

echo $html;
?>