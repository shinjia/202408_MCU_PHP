<?php
include '../common/utility.php';

$page = $_GET['code'] ?? 'error';

// 參數定義，可依需要自行修改
$path = 'data/';   // 存放網頁內容的資料夾
$filename = $path . $code . '.html';  // 規定副檔案為 .htm

if(file_exists($filename)) {
   $html = join ('', file($filename));   // 讀取檔案內容並組成文字串
}
else {
	 // 找不到檔案時的顯示訊息
   $html = error_message('page', $page);
}

include 'pagemake.php';
pagemake($html, '');
?>