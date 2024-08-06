<?php
include 'data.php';

$id = $_GET['id'] ?? 'x';

// 錯誤處理
if(!isset($a_fruits[$id])) {
    $data = '<h1>查無此資料</h1>';
}
else {
    // 取出指定的項目
    $name  = $a_fruits[$id]['name'];
    $descr = $a_fruits[$id]['descr'];
    $pic   = $a_fruits[$id]['pic'];

    // 要顯示的畫面
    $data = <<< HEREDOC
    <h1>{$name}</h1>
    <p>{$descr}</p>
    <p><img src="images/{$pic}"></p>
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
    <p>[<a href="list.php">回清單頁</a>]</p>

    {$data}

</body>
</html>
HEREDOC;

echo $html;
?>