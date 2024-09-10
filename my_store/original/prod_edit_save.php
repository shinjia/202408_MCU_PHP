<?php
include '../common/config.php';
include '../common/define.php';
include '../common/utility.php';

// 接受外部表單傳入之變數
$uid = $_POST['uid'] ?? 0;
$prod_code   = $_POST['prod_code']   ?? '';
$prod_name   = $_POST['prod_name']   ?? '';
$category    = $_POST['category']    ?? '';
$description = $_POST['description'] ?? '';
$price_mark  = $_POST['price_mark']  ?? '';
$price       = $_POST['price']       ?? '';
$picture     = $_POST['picture']     ?? '';
$pictset     = $_POST['pictset']     ?? '';



// 連接資料庫
$pdo = db_open(); 


// 寫出 SQL 語法
$sqlstr = "UPDATE product SET prod_code=:prod_code, prod_name=:prod_name, category=:category, description=:description, price_mark=:price_mark, price=:price, picture=:picture, pictset=:pictset WHERE uid=:uid " ;

$sth = $pdo->prepare($sqlstr);
$sth->bindParam(':prod_code'  , $prod_code  , PDO::PARAM_STR);
$sth->bindParam(':prod_name'  , $prod_name  , PDO::PARAM_STR);
$sth->bindParam(':category'   , $category   , PDO::PARAM_STR);
$sth->bindParam(':description', $description, PDO::PARAM_STR);
$sth->bindParam(':price_mark' , $price_mark , PDO::PARAM_STR);
$sth->bindParam(':price'      , $price      , PDO::PARAM_INT);
$sth->bindParam(':picture'    , $picture    , PDO::PARAM_STR);
$sth->bindParam(':pictset'    , $pictset    , PDO::PARAM_STR);

$sth->bindParam(':uid', $uid, PDO::PARAM_INT);

// 執行SQL及處理結果
if($sth->execute()) {
   $url_display = 'prod_display.php?uid=' . $uid;
   header('Location: ' . $url_display);
}
else {
   header('Location: error.php');
   echo print_r($pdo->errorInfo()) . '<br />' . $sqlstr;  // 此列供開發時期偵錯用
}
?>