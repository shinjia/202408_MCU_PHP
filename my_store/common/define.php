<?php

define('URL_ROOT', 'http://localhost/myweb/my_store/');  // 網站根目錄

// 用於系統檢查 (如uid,chk)
define('SYSTEM_CODE', 'XXX');

// 登入權限檢查的判斷條件，不同的系統要改名稱
define('DEF_LOGIN_ADMIN', 'XXX_ADMIN');   // 登入檢查，ADMIN
define('DEF_LOGIN_MEMBER', 'XXX_MEMBER');   // 登入檢查，MEMBER


// 畫面上顯示的資訊
define('MASTER_COMPANY_NAME', '樂學教育機構');   // 公司名稱
define('MASTER_COMPANY_EMAIL', 'happy@gmail.comm');   // 公司信箱


// 設定欄位的值域選項 (customer)

// 設定欄位『gentle』的值域選項
$a_gentle = array(
    'M'=>'男',
    'F'=>'女',
    'X'=>'未知' );

// 設定欄位『blood』的值域選項
$a_blood = array(
    'A'=>'A',
    'B'=>'B',
    'O'=>'O',
    'AB'=>'AB' );

// 設定欄位『job』的值域選項
$a_job = array(
    'A'=>'學生',
    'B'=>'上班族',
    'C'=>'自由業',
    'D'=>'家管',
    'X'=>'其他' );

// 設定欄位『epaper』的值域選項
$a_epaper = array(
    'Y'=>'願意收電子報' );

// 設定欄位『level』的值域選項
$a_level = array(
    'GUEST'=>'訪客',
    'MEMBER'=>'會員',
    'ADMIN'=>'管理員' );


// 設定欄位的值域選項 (cart)
// 設定欄位『cart_status』的值域選項
$a_cart_status = array(
    'CART'=>'置於購物車',
    'ORDER'=>'已訂購' );


// 設定欄位的值域選項 (tran)
// 設定欄位『tran_status』的值域選項
$a_tran_status = array(
    'ORDER'=>'訂購',
    'PROC'=>'處理中',
    'CLOSE'=>'結案' );
 
?>