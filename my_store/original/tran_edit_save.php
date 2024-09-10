<?php
include '../common/config.php';
include '../common/define.php';
include '../common/utility.php';

// 接受外部表單傳入之變數
$uid = $_POST['uid'] ?? 0;
$tran_code    = $_POST['tran_code']    ??'';
$account      = $_POST['account']      ??'';
$tran_date    = $_POST['tran_date']    ??'';
$fee_product  = $_POST['fee_product']  ??'';
$fee_delivery = $_POST['fee_delivery'] ??'';
$total_price  = $_POST['total_price']  ??'';
$notes        = $_POST['notes']        ??'';
$tran_status  = $_POST['tran_status']  ??'';



// 連接資料庫
$pdo = db_open(); 


// 寫出 SQL 語法
$sqlstr = "UPDATE tran SET tran_code=:tran_code, account=:account, tran_date=:tran_date, fee_product=:fee_product, fee_delivery=:fee_delivery, total_price=:total_price, notes=:notes, tran_status=:tran_status WHERE uid=:uid " ;

$sth = $pdo->prepare($sqlstr);
$sth->bindParam(':tran_code'   , $tran_code   , PDO::PARAM_STR);
$sth->bindParam(':account'     , $account     , PDO::PARAM_STR);
$sth->bindParam(':tran_date'   , $tran_date   , PDO::PARAM_STR);
$sth->bindParam(':fee_product' , $fee_product , PDO::PARAM_INT);
$sth->bindParam(':fee_delivery', $fee_delivery, PDO::PARAM_INT);
$sth->bindParam(':total_price' , $total_price , PDO::PARAM_INT);
$sth->bindParam(':notes'       , $notes       , PDO::PARAM_STR);
$sth->bindParam(':tran_status' , $tran_status , PDO::PARAM_STR);

$sth->bindParam(':uid', $uid, PDO::PARAM_INT);

// 執行SQL及處理結果
if($sth->execute()) {
   $url_display = 'tran_display.php?uid=' . $uid;
   header('Location: ' . $url_display);
}
else {
   header('Location: error.php');
   echo print_r($pdo->errorInfo()) . '<br />' . $sqlstr;  // 此列供開發時期偵錯用
}
?>