<?php
session_start();

include 'define.php';

$ss_usertype = $_SESSION[DEF_SESSION_USERTYPE] ?? '';
$ss_usercode = $_SESSION[DEF_SESSION_USERCODE] ?? '';

$a_valid_usertype = array(DEF_LOGIN_MEMBER, DEF_LOGIN_ADMIN);  // 可以使用本網頁的權限

if(!in_array($ss_usertype, $a_valid_usertype)) {
    header('Location: login_error.php');
    exit;
}

//==============================================================================


$html = <<< HEREDOC
<h2>會員及管理者均可使用</h2>
<p>這一支程式可讓『會員』或『管理者』執行</p>
HEREDOC;

include 'pagemake.php';
pagemake($html);
?>