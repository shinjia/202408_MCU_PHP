<?php
include '../common/config.php';
include '../common/define.php';
include '../common/utility.php';

$uid = $_GET["uid"] ?? 0;

// 設定欄位『cart_status』的值域選項
$a_cart_status = array(
      "CART"=>"置於購物車",
      "ORDER"=>"已訂購" );



// 連接資料庫
$pdo = db_open();

// 寫出 SQL 語法
$sqlstr = "SELECT * FROM cart WHERE uid=:uid ";

$sth = $pdo->prepare($sqlstr);
$sth->bindParam(':uid', $uid, PDO::PARAM_INT);

// 執行 SQL

if($sth->execute()) {
   // 成功執行 query 指令
   if($row = $sth->fetch(PDO::FETCH_ASSOC)) {
      $uid = $row['uid'];
      $tran_code   = html_encode($row['tran_code']);
      $account     = html_encode($row['account']);
      $prod_code   = html_encode($row['prod_code']);
      $unit_price  = html_encode($row['unit_price']);
      $amount      = html_encode($row['amount']);
      $cart_status = html_encode($row['cart_status']);

        // 顯示『cart_status』欄位的選項值及文字
        $str_cart_status = "(" . $cart_status. ") " . $a_cart_status[$cart_status];
        

   $data = <<< HEREDOC
      <table>
         <tr><th>訂單代碼</th><td>{$tran_code}</td></tr>
         <tr><th>客戶代碼</th><td>{$account}</td></tr>
         <tr><th>產品代碼</th><td>{$prod_code}</td></tr>
         <tr><th>單價</th><td>{$unit_price}</td></tr>
         <tr><th>數量</th><td>{$amount}</td></tr>
         <tr><th>項目狀態</th><td>{$str_cart_status}</td></tr>

      </table>
HEREDOC;
   }
   else {
 	   $data = '查不到相關記錄！';
   }
}
else {
   // 無法執行 query 指令時
   $data = error_message('display');
}


$html = <<< HEREDOC
<button onclick="location.href='cart_list_page.php';">返回列表</button>
<h2>顯示資料</h2>
{$data}
HEREDOC;
 
include 'pagemake.php';
pagemake($html, '');
?>