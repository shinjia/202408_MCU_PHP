<?php
// me
/*
$name = '陳信嘉';
$age = 50;
$photo = 'images/person1.png';
$myid = 1;
*/

// 小美

$name = '小美';
$age = 25;
$photo = 'images/person2.png';
$myid = 2;


// 其他變數
$today = date('Y年m月d日 星期w ', time());
$next = date('Y年m月d日 星期w ', time()+86400*7);
$num = mt_rand(1, 42);

$choice = mt_rand(1,6);
$who = 'images/person' . $choice . '.png';

// 比對
// ==   >  >=  < <=   !=   <>
$msg = '';
if($myid==$choice) {
    $msg = '就是你了';
}


$html = <<< HEREDOC
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <p>
   今天誰買便當 <img src="{$who}" style="width:80px;">
   <span style="font-size:30px; color:#FF0000; background-color:#FFFF00;">{$msg}</span>
   </p>

    <h1>開始PHP</h1>
    <p>今天是 {$today}</p>
    <p>下週是 {$next}</p>
    <p>幸運數字：<span style="font-size:40px; color:red;">{$num}</span></p>
    <p>我是：{$name}</p>
    <p>年齡：{$age} 歲</p>
    <p><img src="{$photo}" style="width:80px;"></p>
</body>
</html>
HEREDOC;

echo $html;
?>