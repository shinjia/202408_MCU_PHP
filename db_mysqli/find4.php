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
<div style="border:1px solid red">
<form method="post" action="find4_x.php">
<p>姓名 (包含的文字)：<input type="text" name="key">
<input type="hidden" name="type" value="NAME">
</p>
<p><input type="submit" value="查詢"></p>
</form>
</div>

<hr >
<div style="border:1px solid red">
<form method="post" action="find4_x.php" style="background-color='#FFFFAA'">
<p>地址 (包含的文字)：<input type="text" name="key">
<input type="hidden" name="type" value="ADDR">
</p>
<p><input type="submit" value="查詢"></p>
</form>
</div>


</body>
</html>
HEREDOC;

echo $html;
?>