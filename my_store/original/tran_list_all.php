<?php
include '../common/config.php';
include '../common/define.php';
include '../common/utility.php';

// 連接資料庫
$pdo = db_open();

// 寫出 SQL 語法
$sqlstr = "SELECT * FROM tran ";

$sth = $pdo->prepare($sqlstr);

// 執行SQL及處理結果
if($sth->execute()) {
   // 成功執行 query 指令
   $total_rec = $sth->rowCount();
   $data = '';
   while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
      $uid = $row['uid'];
      $tran_code    = html_encode($row['tran_code']);
      $account      = html_encode($row['account']);
      $tran_date    = html_encode($row['tran_date']);
      $fee_product  = html_encode($row['fee_product']);
      $fee_delivery = html_encode($row['fee_delivery']);
      $total_price  = html_encode($row['total_price']);
      $notes        = html_encode($row['notes']);
      $tran_status  = html_encode($row['tran_status']);

    
      $data .= <<< HEREDOC
     <tr>
        <td>{$uid}</td>
        <td>{$tran_code}</td>
        <td>{$account}</td>
        <td>{$tran_date}</td>
        <td>{$fee_product}</td>
        <td>{$fee_delivery}</td>
        <td>{$total_price}</td>
        <td>{$str_notes}</td>
        <td>{$str_tran_status}</td>

       <td><a href="tran_display.php?uid={$uid}">詳細</a></td>
       <td><a href="tran_edit.php?uid={$uid}">修改</a></td>
       <td><a href="tran_delete.php?uid={$uid}" onClick="return confirm('確定要刪除嗎？');">刪除</a></td>
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
        <th>訂單日期</th>
        <th>商品總價</th>
        <th>運費</th>
        <th>總價</th>
        <th>備註事項</th>
        <th>訂單狀態</th>

      <th colspan="3" align="center"><a href="tran_add.php">新增記錄</a></th>
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