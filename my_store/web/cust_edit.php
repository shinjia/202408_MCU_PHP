<?php
session_start();

include '../common/config.php';
include '../common/define.php';
include '../common/utility.php';

$ss_usertype = $_SESSION['usertype'] ?? '';
$ss_usercode = $_SESSION['usercode'] ?? '';

if($ss_usertype!=DEF_LOGIN_MEMBER) {
   header("Location: login.php");
   exit;
}



$uid = $_GET['uid'] ?? '';

// 避免竄改傳入參數
$chk = $_GET['chk'] ?? '';

if($chk!=md5(SYSTEM_CODE.$uid)) {
   header("Location: error.php");
   exit;
}


// 連接資料庫
$pdo = db_open();

// 寫出 SQL 語法
$sqlstr = "SELECT * FROM customer WHERE uid=:uid ";

$sth = $pdo->prepare($sqlstr);
$sth->bindParam(':uid', $uid, PDO::PARAM_INT);


// 執行SQL及處理結果
if($sth->execute()) {
   // 成功執行 query 指令
   if($row = $sth->fetch(PDO::FETCH_ASSOC)) {
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

        // 處理『gentle』欄位的 RADIO 選項
        $radio_gentle = '';
        foreach($a_gentle as $key=>$value) {
        	$str_checked = ($gentle==$key) ? 'checked' : '';
           $radio_gentle .= '<input type="radio" name="gentle" value="' . $key . '" ' . $str_checked . '>' . $value;
        }

        // 處理『blood』欄位的 RADIO 選項
        $radio_blood = '';
        foreach($a_blood as $key=>$value) {
        	$str_checked = ($blood==$key) ? 'checked' : '';
           $radio_blood .= '<input type="radio" name="blood" value="' . $key . '" ' . $str_checked . '>' . $value;
        }

        // 處理『job』欄位的 SELECT..OPTION 選項
        $select_job = '<select name="job">';
        foreach($a_job as $key=>$value) {
        	  $str_selected = ($job==$key) ? 'selected' : '';
           $select_job .= '<option value="' . $key . '" ' . $str_selected . '>' . $value . '</option>';
        }
        $select_job .= '</select>';
        
        // 處理『epaper』欄位的 Checkbox 選項
        $checkbox_epaper = '';
        $str_checked = (isset($a_epaper[$epaper])) ? 'checked' : '';
        foreach($a_epaper as $key=>$value) {
           $checkbox_epaper .= '<input type="checkbox" name="epaper" value="' . $key . '" ' . $str_checked . ' />' . $value;
        }

        // 處理『level』欄位的 RADIO 選項
        $radio_level = '';
        foreach($a_level as $key=>$value) {
        	$str_checked = ($level==$key) ? 'checked' : '';
           $radio_level .= '<input type="radio" name="level" value="' . $key . '" ' . $str_checked . '>' . $value;
        }


      
      $data = <<< HEREDOC
      <form action="cust_edit_save.php" method="post">
      <table>
        <tr><th>帳號</th><td><input type="text" name="account" value="{$account}" /></td></tr>
        <tr><th>密碼</th><td><input type="password" name="password" value="{$password}" />**密碼欄位應該在修改程式中刪除**</td></tr>
        <tr><th>改密碼Ｑ</th><td><input type="text" name="forget_q" value="{$forget_q}" /></td></tr>
        <tr><th>改密碼Ａ</th><td><input type="password" name="forget_a" value="{$forget_a}" />**密碼欄位應該在修改程式中刪除**</td></tr>
        <tr><th>暱稱</th><td><input type="text" name="nickname" value="{$nickname}" /></td></tr>
        <tr><th>真實姓名</th><td><input type="text" name="realname" value="{$realname}" /></td></tr>
        <tr><th>性別</th><td>{$radio_gentle}</td></tr>
        <tr><th>生日</th><td><input type="text" name="birthday" value="{$birthday}" />**輸入日期格式Y-m-d**</td></tr>
        <tr><th>血型</th><td>{$radio_blood}</td></tr>
        <tr><th>職業</th><td>{$select_job}</td></tr>
        <tr><th>興趣</th><td><input type="text" name="interest" value="{$interest}" /></td></tr>
        <tr><th>郵遞區號</th><td><input type="text" name="zipcode" value="{$zipcode}" /></td></tr>
        <tr><th>地址</th><td><input type="text" name="address" value="{$address}" /></td></tr>
        <tr><th>電話</th><td><input type="text" name="telephone" value="{$telephone}" /></td></tr>
        <tr><th>電子郵件</th><td><input type="text" name="email" value="{$email}" /></td></tr>
        <tr><th>收電子報</th><td>{$checkbox_epaper}</td></tr>
        <tr><th>等級</th><td>{$radio_level}</td></tr>
        <tr><th>最後登錄</th><td><input type="text" name="lastlogin" value="{$lastlogin}" />**輸入日期格式Y-m-d**</td></tr>

      </table>
      <p>
        <input type="hidden" name="uid" value="{$uid}">
        <input type="hidden" name="chk" value="{$chk}">
        <input type="submit" value="送出">
      </p>
      </form>
HEREDOC;
   }
   else {
 	   $data = '查不到相關記錄！';
   }
}
else {
   // 無法執行 query 指令時
   $data = error_message('edit');
}



$html = <<< HEREDOC
<h2>修改資料</h2>
<button onclick="history.back();">返回</button>
{$data}
HEREDOC;

include 'pagemake.php';
pagemake($html);
?>