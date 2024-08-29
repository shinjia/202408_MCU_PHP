<?php
include 'config.php';

// 連接資料庫
$link = db_open();


$sqlstr = "SELECT DISTINCT address FROM person ";

$result = mysqli_query($link, $sqlstr);

$data = '';
while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)) {
   $address  = $row['address'];
   
   $data .= '<option>' . $address . '</option>';
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
   <form method="post" action="find5_x.php">
      <p>地址
         <select name="key">
          {$data}
         </select>
      </p>
      <p><input type="submit" value="查詢"></p>
   </form>
</body>
</html>
HEREDOC;

echo $html;
?>