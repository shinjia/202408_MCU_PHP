<?php
session_start();

include '../common/config.php';
include '../common/define.php';
include '../common/utility.php';

$ss_usertype = $_SESSION['usertype'] ?? '';
$ss_usercode = $_SESSION['usercode'] ?? '';

if(($ss_usertype!=DEF_LOGIN_MEMBER)) {
   header('Location: login_error.php');
   exit;
}

//------ End of Login Check ------------------------

// 接受外部表單傳入之變數
$uid    = $_POST['uid']    ?? '';
$amount = $_POST['amount'] ?? 1;


// 連接資料庫
$pdo = db_open();

// 寫出 SQL 語法
$sqlstr = "UPDATE cart SET amount=:amount WHERE uid=:uid ";

$sth = $pdo->prepare($sqlstr);
$sth->bindParam(':amount', $amount, PDO::PARAM_STR);
$sth->bindParam(':uid', $uid, PDO::PARAM_INT);

// 執行SQL及處理結果
if($sth->execute()) {
   header('Location: cart_list.php');
}
else {
   header('Location: error.php');
   echo print_r($pdo->errorInfo()) . '<br />' . $sqlstr;  // 此列供開發時期偵錯用
}
?>