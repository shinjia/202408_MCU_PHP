<?php


$html = <<< HEREDOC
<button onclick="history.back();">返回</button>
<h2>新增資料</h2>
<form action="tran_add_save.php" method="post">
<table>
    <tr><th>訂單代碼</th><td><input type="text" name="tran_code" value="" /></td></tr>
    <tr><th>客戶代碼</th><td><input type="text" name="account" value="" /></td></tr>
    <tr><th>訂單日期</th><td><input type="text" name="tran_date" value="" />**日期格式 Y-m-d**</td></tr>
    <tr><th>商品總價</th><td><input type="text" name="fee_product" value="" /></td></tr>
    <tr><th>運費</th><td><input type="text" name="fee_delivery" value="" /></td></tr>
    <tr><th>總價</th><td><input type="text" name="total_price" value="" /></td></tr>
    <tr><th>備註事項</th><td><textarea name="notes"></textarea></td></tr>
    <tr><th>訂單狀態</th><td>{$radio_tran_status}</td></tr>

</table>
<p><input type="submit" value="新增"></p>
</form>
HEREDOC;

include 'pagemake.php';
pagemake($html, '');
?>