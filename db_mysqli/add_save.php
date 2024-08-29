<?php
include 'config.php';

$usercode = $_POST['usercode'] ?? '';
$username = $_POST['username'] ?? '';
$address  = $_POST['address']  ?? '';
$birthday = $_POST['birthday'] ?? '';
$height   = $_POST['height']   ?? '';
$weight   = $_POST['weight']   ?? '';
$remark   = $_POST['remark']   ?? '';

// 對欄位進行嚴格調整
// (1) 文字欄位去除前後空白
// (2) 日期欄位改格式
// (3) 數值欄位強制轉為整數 (或浮點數flotval()
$username = trim($username);
$address  = trim($address);
$birthday = date('Y-m-d', strtotime($birthday));
$height = intval($height);
$weight = intval($weight);

// 連接資料庫
$link = db_open();

// 寫出 SQL 語法
$sqlstr = "INSERT INTO person(usercode, username, address, birthday, height, weight, remark)
 VALUES ('$usercode', '$username', '$address', '$birthday', '$height', '$weight', '$remark') ";

// 執行 SQL
if(mysqli_query($link, $sqlstr)) {
   $new_uid = mysqli_insert_id($link);    // 傳回剛才新增記錄的 auto_increment 的欄位值
   $url = 'display.php?uid=' . $new_uid;
   // header('Location:' . $url);
   // exit;

   $msg = '資料已新增!!!!!!!!<br/>';
   $msg .= '<a href="display.php?uid=' . $new_uid . '">詳細</a>';
}
else {
   $msg = '資料無法新增!!!!!!!!';
   $msg .= '<hr>' . $sqlstr . '<hr>' . mysqli_error($link);
}

db_close($link);


$html = <<< HEREDOC
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>基本資料庫系統</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<p><a href="index.php">回首頁</a></p>

{$msg}
</body>
</html>
HEREDOC;

echo $html;
?>
