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
<h1>查詢程式 (分頁顯示)</h1>
<form method="post" action="find3_x.php">

<p>姓名 (包含的文字)：<input type="text" name="key1"></p>
<p>地址 (包含的文字)：<input type="text" name="key2"></p>
<p><input type="submit" value="查詢"></p>
</form>
</body>
</html>
HEREDOC;

echo $html;
?>