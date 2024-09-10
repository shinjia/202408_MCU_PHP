<?php
include '../common/config.php';
include '../common/define.php';
include '../common/utility.php';

// 連接資料庫
$pdo = db_open();

// 寫出 SQL 語法
$sqlstr = "SELECT * FROM customer ";

$sth = $pdo->prepare($sqlstr);

// 執行SQL及處理結果
if($sth->execute()) {
   // 成功執行 query 指令
   $total_rec = $sth->rowCount();
   $data = '';
   while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
      $uid = $row['uid'];
      $account   = html_encode($row['account']);
      $password  = html_encode($row['password']);
      $forget_q  = html_encode($row['forget_q']);
      $forget_a  = html_encode($row['forget_a']);
      $nickname  = html_encode($row['nickname']);
      $realname  = html_encode($row['realname']);
      $gentle    = html_encode($row['gentle']);
      $birthday  = html_encode($row['birthday']);
      $blood     = html_encode($row['blood']);
      $job       = html_encode($row['job']);
      $interest  = html_encode($row['interest']);
      $zipcode   = html_encode($row['zipcode']);
      $address   = html_encode($row['address']);
      $telephone = html_encode($row['telephone']);
      $email     = html_encode($row['email']);
      $epaper    = html_encode($row['epaper']);
      $level     = html_encode($row['level']);
      $lastlogin = html_encode($row['lastlogin']);

    
      $data .= <<< HEREDOC
     <tr>
        <td>{$uid}</td>
        <td>{$account}</td>
        <td>{$str_password}</td>
        <td>{$forget_q}</td>
        <td>{$str_forget_a}</td>
        <td>{$nickname}</td>
        <td>{$realname}</td>
        <td>{$str_gentle}</td>
        <td>{$birthday}</td>
        <td>{$str_blood}</td>
        <td>{$str_job}</td>
        <td>{$interest}</td>
        <td>{$zipcode}</td>
        <td>{$address}</td>
        <td>{$telephone}</td>
        <td>{$email}</td>
        <td>{$str_epaper}</td>
        <td>{$str_level}</td>
        <td>{$lastlogin}</td>

       <td><a href="cust_display.php?uid={$uid}">詳細</a></td>
       <td><a href="cust_edit.php?uid={$uid}">修改</a></td>
       <td><a href="cust_delete.php?uid={$uid}" onClick="return confirm('確定要刪除嗎？');">刪除</a></td>
     </tr>
HEREDOC;
   }
   
   $html = <<< HEREDOC
   <h2 align="center">共有 {$total_rec} 筆記錄</h2>
   <table border="1" align="center">
      <tr>
        <th>序號</th>
        <th>帳號</th>
        <th>密碼</th>
        <th>改密碼Ｑ</th>
        <th>改密碼Ａ</th>
        <th>暱稱</th>
        <th>真實姓名</th>
        <th>性別</th>
        <th>生日</th>
        <th>血型</th>
        <th>職業</th>
        <th>興趣</th>
        <th>郵遞區號</th>
        <th>地址</th>
        <th>電話</th>
        <th>電子郵件</th>
        <th>收電子報</th>
        <th>等級</th>
        <th>最後登錄</th>

      <th colspan="3" align="center"><a href="cust_add.php">新增記錄</a></th>
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