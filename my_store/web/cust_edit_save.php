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


// 接受外部表單傳入之變數
$uid = $_POST['uid'] ?? 0;
$account   = $_POST['account']   ? '';
$password  = $_POST['password']  ? '';
$forget_q  = $_POST['forget_q']  ? '';
$forget_a  = $_POST['forget_a']  ? '';
$nickname  = $_POST['nickname']  ? '';
$realname  = $_POST['realname']  ? '';
$gentle    = $_POST['gentle']    ? '';
$birthday  = $_POST['birthday']  ? '';
$blood     = $_POST['blood']     ? '';
$job       = $_POST['job']       ? '';
$interest  = $_POST['interest']  ? '';
$zipcode   = $_POST['zipcode']   ? '';
$address   = $_POST['address']   ? '';
$telephone = $_POST['telephone'] ? '';
$email     = $_POST['email']     ? '';
$epaper    = $_POST['epaper']    ? '';
$level     = $_POST['level']     ? '';
$lastlogin = $_POST['lastlogin'] ? '';


// 避免竄改傳入參數
$chk = $_POST['chk'] ?? '';

if($chk!=md5(SYSTEM_CODE.$uid)) {
   header("Location: error.php");
   exit;
}


// 連接資料庫
$pdo = db_open(); 

// 寫出 SQL 語法
$sqlstr = "UPDATE customer SET account=:account, password=:password, forget_q=:forget_q, forget_a=:forget_a, nickname=:nickname, realname=:realname, gentle=:gentle, birthday=:birthday, blood=:blood, job=:job, interest=:interest, zipcode=:zipcode, address=:address, telephone=:telephone, email=:email, epaper=:epaper, level=:level, lastlogin=:lastlogin WHERE uid=:uid " ;

$sth = $pdo->prepare($sqlstr);
$sth->bindParam(':account'  , $account  , PDO::PARAM_STR);
$sth->bindParam(':password' , $password , PDO::PARAM_STR);
$sth->bindParam(':forget_q' , $forget_q , PDO::PARAM_STR);
$sth->bindParam(':forget_a' , $forget_a , PDO::PARAM_STR);
$sth->bindParam(':nickname' , $nickname , PDO::PARAM_STR);
$sth->bindParam(':realname' , $realname , PDO::PARAM_STR);
$sth->bindParam(':gentle'   , $gentle   , PDO::PARAM_STR);
$sth->bindParam(':birthday' , $birthday , PDO::PARAM_STR);
$sth->bindParam(':blood'    , $blood    , PDO::PARAM_STR);
$sth->bindParam(':job'      , $job      , PDO::PARAM_STR);
$sth->bindParam(':interest' , $interest , PDO::PARAM_STR);
$sth->bindParam(':zipcode'  , $zipcode  , PDO::PARAM_STR);
$sth->bindParam(':address'  , $address  , PDO::PARAM_STR);
$sth->bindParam(':telephone', $telephone, PDO::PARAM_STR);
$sth->bindParam(':email'    , $email    , PDO::PARAM_STR);
$sth->bindParam(':epaper'   , $epaper   , PDO::PARAM_STR);
$sth->bindParam(':level'    , $level    , PDO::PARAM_STR);
$sth->bindParam(':lastlogin', $lastlogin, PDO::PARAM_STR);

$sth->bindParam(':uid', $uid, PDO::PARAM_INT);

// 執行SQL及處理結果
if($sth->execute()) {
   $url_display = 'cust_view.php';
   header('Location: ' . $url_display);
}
else {
   header('Location: error.php');
   echo print_r($pdo->errorInfo()) . '<br />' . $sqlstr;  // 此列供開發時期偵錯用
}
?>