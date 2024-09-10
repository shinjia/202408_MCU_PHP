<?php
include '../common/config.php';
include '../common/define.php';
include '../common/utility.php';

// 連接資料庫
$pdo = db_open();


// 新增資料表之SQL語法 (採用陣列方式，可以設定多個)
$a_table["cart"] = "

CREATE TABLE cart
(
   uid int(11) NOT NULL auto_increment, 
   tran_code VARCHAR(255) NULL, 
   account VARCHAR(255) NULL, 
   prod_code VARCHAR(255) NULL, 
   unit_price INT NULL, 
   amount INT NULL, 
   cart_status VARCHAR(255) NULL, 
   PRIMARY KEY (uid) ); 

";


// 執行SQL及處理結果
$msg = '';
foreach($a_table as $key=>$sqlstr) {
   $sth = $pdo->exec($sqlstr);   
   if($sth===FALSE) {
      $msg .= '資料表『' . $key . '』無法建立<br />';
      $msg .= print_r($pdo->errorInfo(),TRUE) . '<br />' . $sqlstr;
   }
   else {
      $msg .= '資料表『' . $key . '』建立完成<BR>';
   }
}


$html = <<< HEREDOC
<body>
<h2>資料表建立結果</h2>
{$msg}
HEREDOC;

include 'pagemake.php';
pagemake($html, '');
?>