<?php
include 'data.php';

$data = '';
foreach($a_fruits as $key=>$a_one) {
    $name  = $a_one['name'];
    $descr = $a_one['descr'];
    $pic   = $a_one['pic'];

    // 要顯示的畫面
    $data .= <<< HEREDOC
    <a href="display.php?id={$key}"><img src="images/{$pic}"></a>
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