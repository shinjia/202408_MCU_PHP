<?php
include '../common/config.php';
include '../common/define.php';
include '../common/utility.php';

$uid = $_GET["uid"] ?? 0;


// 連接資料庫
$pdo = db_open();

// 寫出 SQL 語法
$sqlstr = "SELECT * FROM customer WHERE uid=:uid ";

$sth = $pdo->prepare($sqlstr);
$sth->bindParam(':uid', $uid, PDO::PARAM_INT);

// 執行 SQL

if($sth->execute()) {
   // 成功執行 query 指令
   if($row = $sth->fetch(PDO::FETCH_ASSOC)) {
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

        // 顯示『password』密碼欄位的轉換
        $str_password = str_repeat("*", strlen($password));

        // 顯示『forget_a』密碼欄位的轉換
        $str_forget_a = str_repeat("*", strlen($forget_a));

        // 顯示『gentle』欄位的選項值及文字
        $str_gentle = "(" . $gentle. ") " . $a_gentle[$gentle];
        
        // 顯示『blood』欄位的選項值及文字
        $str_blood = "(" . $blood. ") " . $a_blood[$blood];
        
        // 顯示『job』欄位的選項值及文字
        $str_job = "(" . $job. ") " . $a_job[$job];
        
        // 顯示『epaper』欄位的核選值及文字
        $str_epaper = isset($a_epaper[$epaper]) ? $a_epaper[$epaper] : "*無勾選*";
        
        // 顯示『level』欄位的選項值及文字
        $str_level = "(" . $level. ") " . $a_level[$level];
        

   $data = <<< HEREDOC
        <table>
            <tr><th>帳號</th><td>{$account}</td></tr>
            <tr><th>密碼</th><td>$str_password</td></tr>
            <tr><th>改密碼Ｑ</th><td>{$forget_q}</td></tr>
            <tr><th>改密碼Ａ</th><td>$str_forget_a</td></tr>
            <tr><th>暱稱</th><td>{$nickname}</td></tr>
            <tr><th>真實姓名</th><td>{$realname}</td></tr>
            <tr><th>性別</th><td>{$str_gentle}</td></tr>
            <tr><th>生日</th><td>{$birthday}</td></tr>
            <tr><th>血型</th><td>{$str_blood}</td></tr>
            <tr><th>職業</th><td>{$str_job}</td></tr>
            <tr><th>興趣</th><td>{$interest}</td></tr>
            <tr><th>郵遞區號</th><td>{$zipcode}</td></tr>
            <tr><th>地址</th><td>{$address}</td></tr>
            <tr><th>電話</th><td>{$telephone}</td></tr>
            <tr><th>電子郵件</th><td>{$email}</td></tr>
            <tr><th>收電子報</th><td>{$str_epaper}</td></tr>
            <tr><th>等級</th><td>{$str_level}</td></tr>
            <tr><th>最後登錄</th><td>{$lastlogin}</td></tr>
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
<button onclick="location.href='cust_list_page.php';">返回列表</button>
<h2>顯示資料</h2>
{$data}
HEREDOC;
 
 
include 'pagemake.php';
pagemake($html, '');
?>