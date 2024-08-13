<?php
$nickname = $_POST['nickname'] ?? '';
$password = $_POST['password'] ?? '';
$gender   = $_POST['gender']   ?? '';
$blood    = $_POST['blood']    ?? '';
$birth_yy = $_POST['birth_yy'] ?? '';
$birth_mm = $_POST['birth_mm'] ?? '';
$birth_dd = $_POST['birth_dd'] ?? '';
$marriage = $_POST['marriage'] ?? '';
$hobby1   = $_POST['hobby1']   ?? '';
$hobby2   = $_POST['hobby2']   ?? '';
$hobby3   = $_POST['hobby3']   ?? '';
$hobby4   = $_POST['hobby4']   ?? '';
$intro    = $_POST['intro']    ?? '';

$color    = $_POST['color']    ?? '';


// debug
echo '<pre>';
print_r($_POST);
echo '</pre>';

// extract($_POST);   // 不安全


// 顯示網頁
$html = <<< HEREDOC
<!DOCTYPE html> 
<html> 
<head> 
<meta charset="UTF-8"> 
<title>Survey</title> 
</head> 

<body> 
<h2>{$nickname} 已收到你的資料如下</h2>

<p>姓名：{$nickname}</p>
<p>密碼：{$password}</p>
<p>性別：{$gender}</p>
<p>血型：{$blood}</p>
<p>生日：{$birth_yy} 年 {$birth_mm} 月 {$birth_dd} 日</p>
<p>已婚：{$marriage}</p>
<p>興趣：{$hobby1}, {$hobby2}, {$hobby3}, {$hobby4}</p>
<p>介紹：{$intro}</p>

</body> 
</html> 
HEREDOC;

echo $html; 
?>