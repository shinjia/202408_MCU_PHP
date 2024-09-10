<?php
$postdata = isset($_POST['postdata']) ? $_POST['postdata'] : '';

$obj = json_decode( $postdata );


$fd01 = isset($obj->fd01) ? $obj->fd01 : '';
$fd02 = isset($obj->fd02) ? $obj->fd02 : '';
$fd03 = isset($obj->fd03) ? $obj->fd03 : '';
$fd04 = isset($obj->fd04) ? $obj->fd04 : '';
$fd05 = isset($obj->fd05) ? $obj->fd05 : '';
$fd06 = isset($obj->fd06) ? $obj->fd06 : '';
$fd07 = isset($obj->fd07) ? $obj->fd07 : '';
$fd08 = isset($obj->fd08) ? $obj->fd08 : '';
$fd09 = isset($obj->fd09) ? $obj->fd09 : '';
$fd10 = isset($obj->fd10) ? $obj->fd10 : '';

$memo = isset($obj->memo) ? $obj->memo : '';


$a_fd = array(
   'fd01' => array('name'=>'大腸麵線', 'pic'=>'fd01.jpg', 'descr'=>'蚵仔/大腸麵線，有蚵仔、有大腸，黏黏糊糊的，基本的民生小吃。很多時候並不是在正餐吃，好像下午茶一樣，叫一碗嚐嚐解個饞。' ), 
   'fd02' => array('name'=>'魷魚羹'  , 'pic'=>'fd02.jpg', 'descr'=>'魷魚羹選脆韌有勁的新鮮魷魚搭配旗魚漿、鯊魚漿手工製作的彈口魚丸，湯頭鮮美爽口甜而不膩，令人意猶未盡。' ),
   'fd03' => array('name'=>'肉圓'    , 'pic'=>'fd03.jpg', 'descr'=>'肉圓種類一是用油鍋加熱，一是用蒸的。有名的彰化肉圓、台中肉圓、北斗肉圓等，搞不好每個縣市都有用冠上地名的獨特肉圓噢。' ),
   'fd04' => array('name'=>'蚵仔煎'  , 'pic'=>'fd04.jpg', 'descr'=>'用平底鍋把油燒熱，放上蚵仔、攪拌後的雞蛋、茼蒿菜或小白菜等蔬菜，後再淋上太白粉芡水，待蚵仔熟時盛起，再淋上特製醬料。' ),
   'fd05' => array('name'=>'臭豆腐'  , 'pic'=>'fd05.jpg', 'descr'=>'現在臭豆腐名堂可多了，除了傳統標準型四方塊，改良型的麻辣臭豆腐，一家一家開，還有連鎖店。' ),
   'fd06' => array('name'=>'擔仔麵'  , 'pic'=>'fd06.jpg', 'descr'=>'担仔麵聽說緣自台南度小月，擔著担子在賣的黃湯麵，傳統正字的担仔麵是小小的一碗，上面放了一隻蝦子。' ),
   'fd07' => array('name'=>'米粉湯'  , 'pic'=>'fd07.jpg', 'descr'=>'米粉湯通常就是大骨清湯加芹菜再加點味精，若湯頭是用大骨去熬煮很久的鮮濃高湯，味道超級香濃。' ),
   'fd08' => array('name'=>'生煎包'  , 'pic'=>'fd08.jpg', 'descr'=>'生煎包和水煎包或小籠包不同之處，在於它的皮很薄，而且內饀菜比肉多很多，吃起來比較爽口。' ),
   'fd09' => array('name'=>'刈包'    , 'pic'=>'fd09.jpg', 'descr'=>'長橢圓扁形麵皮，對摺起來包覆餡料。傳統餡料有片狀五花肉、酸菜、花生粉及香菜。因為形狀及內餡似老虎的嘴，所以亦稱作虎咬豬。' ),
   'fd10' => array('name'=>'珍珠奶茶', 'pic'=>'fd10.jpg', 'descr'=>'珍珠奶茶是台灣冰品飲料的代表，使用的材料就是用木薯粉圓，然後加上奶茶，加上冰塊，搖一搖就是了。' ) );


$a_choice = array();
if($fd01=='Y') { $a_choice[] = $a_fd['fd01']; }
if($fd02=='Y') { $a_choice[] = $a_fd['fd02']; }
if($fd03=='Y') { $a_choice[] = $a_fd['fd03']; }
if($fd04=='Y') { $a_choice[] = $a_fd['fd04']; }
if($fd05=='Y') { $a_choice[] = $a_fd['fd05']; }
if($fd06=='Y') { $a_choice[] = $a_fd['fd06']; }
if($fd07=='Y') { $a_choice[] = $a_fd['fd07']; }
if($fd08=='Y') { $a_choice[] = $a_fd['fd08']; }
if($fd09=='Y') { $a_choice[] = $a_fd['fd09']; }
if($fd10=='Y') { $a_choice[] = $a_fd['fd10']; }


$str = '[';
foreach($a_choice as $key=>$a_ary)
{
   $name  = $a_ary['name'];
   $pic   = $a_ary['pic'];
   $descr = $a_ary['descr'];
   
   $str .= <<< HEREDOC
  { 'name'  : '{$name}',
    'pic'   : '{$pic}',
    'descr' : '{$descr}',
  },

HEREDOC;
}
$str .= '] ';


$str = json_encode( $a_choice );


$html = <<< HEREDOC
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>測試</title>

</head>
<body>
<p><a href="javascript:history.go(-1)">回前頁</a></p>
<h2>已確認下列餐點</h2>
<p>{$memo}</p>

<script language="JavaScript">

var vjson = {$str};

for(i=0; i<vjson.length; i++)
{
   var s_name  = vjson[i].name;
   var s_pic   = vjson[i].pic;
   var s_descr = vjson[i].descr;
   
document.write('<table width="460" bgcolor="#EEEEEE" border="1" cellspacing="4" cellpadding="2"><tr><td>');
document.write('<table width="100%" border="0" cellspacing="0" cellpadding="2"><tr bgcolor="#FFDDFF"><td>');
document.write('<div style="text-align:center;">'+ s_name +'</div>');
document.write('<div style="text-align:center;"><img src="../images/'+ s_pic +'"></div>');
document.write('<div style="text-align:left;">'+ s_descr +'</div>');
document.write('</td></tr></table>');
document.write('</td></tr></table>');
document.write('<br>');
}
</script>

</body>
</html>
HEREDOC;

echo $html;
?>