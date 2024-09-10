<?php
include '../common/config.php';
include '../common/define.php';
include '../common/utility.php';

// 連接資料庫
$pdo = db_open();

// 寫出 SQL 語法
$sqlstr = "SELECT * FROM cart ";

$sth = $pdo->prepare($sqlstr);

// 執行SQL及處理結果
if($sth->execute()) {
   // 成功執行 query 指令
   $total_rec = $sth->rowCount();
   $data = '';
   while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
      $uid = $row['uid'];
      $tran_code   = html_encode($row['tran_code']);
      $account     = html_encode($row['account']);
      $prod_code   = html_encode($row['prod_code']);
      $unit_price  = html_encode($row['unit_price']);
      $amount      = html_encode($row['amount']);
      $cart_status = html_encode($row['cart_status']);

    
      $data .= <<< HEREDOC
     <tr>
        <td>{$uid}</td>
        <td>{$tran_code}</td>
        <td>{$account}</td>
        <td>{$prod_code}</td>
        <td>{$unit_price}</td>
        <td>{$amount}</td>
        <td>{$str_cart_status}</td>

       <td><a href="cart_display.php?uid={$uid}">詳細</a></td>
       <td><a href="cart_edit.php?uid={$uid}">修改</a></td>
       <td><a href="cart_delete.php?uid={$uid}" onClick="return confirm('確定要刪除嗎？');">刪除</a></td>
     </tr>
HEREDOC;
   }
   
   $html = <<< HEREDOC
   <h2 align="center">共有 {$total_rec} 筆記錄</h2>
   <table border="1" align="center">
      <tr>
        <th>序號</th>
        <th>訂單代碼</th>
        <th>客戶代碼</th>
        <th>產品代碼</th>
        <th>單價</th>
        <th>數量</th>
        <th>項目狀態</th>

      <th colspan="3" align="center"><a href="cart_add.php">新增記錄</a></th>
      </tr>
      {$data}
   </table>
HEREDOC;
}
else {
   // 無法執行 query 指令時
   $html = error_message('list_all');
}


include 'pagemake.php';
pagemake($html);
?>