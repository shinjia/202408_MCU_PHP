<?php


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
        <li><a href="display.php?id=1">蘋果</a></li>
        <li><a href="display.php?id=2">香蕉</a></li>
        <li><a href="display.php?id=3">鳳梨</a></li>
    </ul>

</body>
</html>
HEREDOC;

echo $html;
?>