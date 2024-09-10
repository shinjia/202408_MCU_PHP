<?php
// mysqli_connect(主機, 帳號, 密碼, 資料庫);
$link = mysqli_connect('localhost', 'root', '', 'class');

$sqlstr = "INSERT INTO person(usercode, username) VALUES ('P002', 'Alen') ";

mysqli_query($link, $sqlstr);


echo 'ok';
?>