<?php
include 'config.php';
include 'utility.php';

// 接收傳入變數
$uid  = $_POST['uid'] ?? '';

$usercode = $_POST['usercode'] ?? '';
$username = $_POST['username'] ?? '';
$address  = $_POST['address']  ?? '';
$birthday = $_POST['birthday'] ?? '';
$height   = $_POST['height']   ?? 0;
$weight   = $_POST['weight']   ?? 0;
$remark   = $_POST['remark']   ?? '';

// 連接資料庫
$pdo = db_open();

// SQL 語法
$sqlstr = "UPDATE person SET usercode=:usercode, username=:username, address=:address, birthday=:birthday, height=:height, weight=:weight, remark=:remark WHERE uid=:uid ";

$sth = $pdo->prepare($sqlstr);
$sth->bindParam(':usercode', $usercode, PDO::PARAM_STR);
$sth->bindParam(':username', $username, PDO::PARAM_STR);
$sth->bindParam(':address' , $address , PDO::PARAM_STR);
$sth->bindParam(':birthday', $birthday, PDO::PARAM_STR);
$sth->bindParam(':height'  , $height  , PDO::PARAM_INT);
$sth->bindParam(':weight'  , $weight  , PDO::PARAM_INT);
$sth->bindParam(':remark'  , $remark  , PDO::PARAM_STR);
$sth->bindParam(':uid'     , $uid     , PDO::PARAM_INT);

// 執行 SQL
try { 
    $sth->execute();

    $lnk_display = "display.php?uid=" . $uid;
    header('Location: ' . $lnk_display);
    exit;
}
catch(PDOException $e) {
    // db_error(ERROR_QUERY, $e->getMessage());
    $ihc_error = error_message('ERROR_QUERY', $e->getMessage());
    
    $html = <<< HEREDOC
    {$ihc_error}
HEREDOC;
    include 'pagemake.php';
    pagemake($html);
}

db_close();
?>