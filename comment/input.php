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
<h1>客戶意見</h1>    
<form method="post" action="save.php">
    <p>姓名：<input type="text" name="username"></p>
    <p>意見：<textarea name="comment" rows="6" cols="40"></textarea></p>
    <p><input type="submit" value="送出"></p>
</form>
</body>
</html>
HEREDOC;

echo $html;
?>