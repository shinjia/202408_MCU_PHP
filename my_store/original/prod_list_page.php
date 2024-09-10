<?php
include '../common/config.php';
include '../common/define.php';
include '../common/utility.php';

$page = $_GET['page'] ?? 1;   // 目前的頁碼
$numpp = 15;  // 每頁的筆數


// 連接資料庫
$pdo = db_open();

// 取得分頁所需之資訊 (總筆數、總頁數、擷取記錄之起始位置)
$sqlstr = "SELECT count(*) as total_rec FROM product ";
$sth = $pdo->query($sqlstr);
if($row = $sth->fetch(PDO::FETCH_ASSOC)) {
   $total_rec = $row["total_rec"];
}
$total_page = ceil($total_rec / $numpp);  // 計算總頁數
$tmp_start = ($page-1) * $numpp;  // 從第幾筆記錄開始抓取資料

// 寫出 SQL 語法
$sqlstr = "SELECT * FROM product ";
$sqlstr .= " LIMIT " . $tmp_start . "," . $numpp;


$sth = $pdo->prepare($sqlstr);

// 執行SQL及處理結果
if($sth->execute()) {
   // 成功執行 query 指令
   $total_rec = $sth->rowCount();
   $data = '';
   while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
      $uid = $row['uid'];
      $prod_code   = html_encode($row['prod_code']);
      $prod_name   = html_encode($row['prod_name']);
      $category    = html_encode($row['category']);
      $description = html_encode($row['description']);
      $price_mark  = html_encode($row['price_mark']);
      $price       = html_encode($row['price']);
      $picture     = html_encode($row['picture']);
      $pictset     = html_encode($row['pictset']);

        // 顯示『description』欄位的文字區域文字
        $str_description = nl2br($description);
   
   $data .= <<< HEREDOC
     <tr>
        <td>{$uid}</td>
        <td>{$prod_code}</td>
        <td>{$prod_name}</td>
        <td>{$category}</td>
        <td>{$str_description}</td>
        <td>{$price_mark}</td>
        <td>{$price}</td>
        <td>{$picture}</td>
        <td>{$pictset}</td>

       <td><a href="prod_display.php?uid=$uid">詳細</a></td>
       <td><a href="prod_edit.php?uid=$uid">修改</a></td>
       <td><a href="prod_delete.php?uid=$uid" onClick="return confirm('確定要刪除嗎？');">刪除</a></td>
    </tr>
HEREDOC;
    }


// ------ 分頁處理開始 -------------------------------------
// 處理分頁之超連結：上一頁、下一頁、第一首、最後頁
$lnk_pageprev = '?page=' . (($page==1)?(1):($page-1));
$lnk_pagenext = '?page=' . (($page==$total_page)?($total_page):($page+1));
$lnk_pagehead = '?page=1';
$lnk_pagelast = '?page=' . $total_page;

// 處理各頁之超連結：列出所有頁數 (暫未用到，保留供參考)
$lnk_pagelist = "";
for($i=1; $i<=$page-1; $i++)
{ $lnk_pagelist .= '<a href="?page='.$i.'">'.$i.'</a> '; }
$lnk_pagelist .= '[' . $i . '] ';
for($i=$page+1; $i<=$total_page; $i++)
{ $lnk_pagelist .= '<a href="?page='.$i.'">'.$i.'</a> '; }

// 處理各頁之超連結：下拉式跳頁選單
$lnk_pagegoto  = '<form method="GET" action="" style="margin:0;">';
$lnk_pagegoto .= '<select name="page" onChange="submit();">';
for($i=1; $i<=$total_page; $i++) {
   $is_current = (($i-$page)==0) ? ' selected' : '';
   $lnk_pagegoto .= '<option' . $is_current . '>' . $i . '</option>';
}
$lnk_pagegoto .= '</select>';
$lnk_pagegoto .= '</form>';

// 將各種超連結組合成HTML顯示畫面
$ihc_navigator  = <<< HEREDOC
<table border="0" align="center">
 <tr>
  <td>頁數：{$page} / {$total_page} &nbsp;&nbsp;&nbsp;</td>
  <td>
  <a href="{$lnk_pagehead}">第一頁</a> 
  <a href="{$lnk_pageprev}">上一頁</a> 
  <a href="{$lnk_pagenext}">下一頁</a> 
  <a href="{$lnk_pagelast}">最末頁</a> &nbsp;&nbsp;
  </td>
 <td>移至頁數：</td>
 <td>{$lnk_pagegoto}</td>
</tr>
</table>
HEREDOC;
// ------ 分頁處理結束 -------------------------------------
}
else {
   // 無法執行 query 指令時
   $html = error_message('list_all');
}


$html = <<< HEREDOC
<h2 align="center">共有 $total_rec 筆記錄</h2>
{$ihc_navigator}
<p></p>
<table border="1" align="center">   
   <tr>
        <th>序號</th>
        <th>商品代碼</th>
        <th>商品名稱</th>
        <th>種類代號</th>
        <th>商品描述</th>
        <th>標示原價</th>
        <th>實際售價</th>
        <th>商品圖檔</th>
        <th>圖檔目錄</th>

      <th colspan="3" align="center"><a href="prod_add.php">新增記錄</a></th>
   </tr>
{$data}
</table>
HEREDOC;

include 'pagemake.php';
pagemake($html);
?>