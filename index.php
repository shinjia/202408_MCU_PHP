<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>PHP</title>
<base target="_blank">
<style>
h2 { background-color: #FF8800; color:#FFFF00; }    
</style>
</head>
<body>
<h3>PHP 老師上課實作</h3>

<p>教學網址：<a href="https://hackmd.io/@Shinjia/BJYskKdKR">https://hackmd.io/@Shinjia/BJYskKdKR</a></p>

<div class="hot" style="background-color:rgb(235, 216, 189); padding:5px;">
    <p>(快速連結) db_系列程式：|
        <a href="db_mysqli/">db_mysqli</a> |
        <a href="db_pdo/">db_pdo</a> |
        <a href="db_ext2/">db_ext2</a> |
    </p>
</div>


<h2>Class 09 (2024/08/29)</h2>
<p>參考上列資料庫系列程式</p>
<p>&nbsp;</p>



<h2>Class 08 (2024/08/27)</h2>
<p>查詢程式 (db_mysqli)</p>
<ul>
    <li>(用list_all來改) find 程式執行 <a href="db_mysqli/find.php">find.php</a>
        查看原始碼：
        [<a href="show_source.php?dir=db_mysqli&amp;file=find.php">find.php</a>]
        [<a href="show_source.php?dir=db_mysqli&amp;file=find_x.php">find_x.php</a>]
    </li>
    <li>(用list_page來改) find2 程式執行 <a href="db_mysqli/find2.php">find2.php</a>
        查看原始碼：
        [<a href="show_source.php?dir=db_mysqli&amp;file=find2.php">find2.php</a>]
        [<a href="show_source.php?dir=db_mysqli&amp;file=find2_x.php">find2_x.php</a>]
    </li>
    <li>find3 程式執行 <a href="db_mysqli/find3.php">find3.php</a>
        查看原始碼：
        [<a href="show_source.php?dir=db_mysqli&amp;file=find3.php">find3.php</a>]
        [<a href="show_source.php?dir=db_mysqli&amp;file=find3_x.php">find3_x.php</a>]
        (查詢多個欄位) 
    </li>
    <li>find4 程式執行 <a href="db_mysqli/find4.php">find4.php</a>
        查看原始碼：
        [<a href="show_source.php?dir=db_mysqli&amp;file=find4.php">find4.php</a>]
        [<a href="show_source.php?dir=db_mysqli&amp;file=find4_x.php">find4_x.php</a>]
        (不同的查詢欄位，用同一支程式)
    </li>
    <li>find5 程式執行 <a href="db_mysqli/find5.php">find5.php</a>
        查看原始碼：
        [<a href="show_source.php?dir=db_mysqli&amp;file=find5.php">find5.php</a>]
        [<a href="show_source.php?dir=db_mysqli&amp;file=find5_x.php">find5_x.php</a>]
        (列出所有地區，用選的)
    </li>
</ul>
<p>&nbsp;</p>



<h2>Class 07 (2024/08/22)</h2>
<p>參考上列資料庫系列程式</p>
<p>&nbsp;</p>



<h2>Class 06 (2024/08/20)</h2>

<p>db_系列程式</p>
<p>PHP 連結 MySQL 的程式測試 (db_test)</p>
<ul>
    <li>查看原始碼：[<a href="show_source.php?dir=db_test&amp;file=test.php">db_test/test.php</a>]</li>
</li>
</ul>
<p>&nbsp;</p>



<h2>Class 05 (2024/08/15)</h2>
<p>補充：表單商品金額計算 (form_v6)</p>
    <ul>
        <li>(v6) 讀取文字資料檔，產生表單元件陣列<br>
        程式 [<a href="form_v6/list.php">執行</a>]
        查看原始碼：
        [<a href="show_source.php?dir=form_v6&amp;file=list.php">list.php</a>]
        [<a href="show_source.php?dir=form_v6&amp;file=calc.php">calc.php</a>]
        [<a href="show_source.php?dir=form_v6&amp;file=utility.php">utility.php</a>]
        [<a href="show_source.php?dir=form_v6&amp;file=data.txt">data.txt</a>]
        </li>
    </ul>

    <p>客戶意見留言 (comment)</p>
<ul>
    <li>程式執行 <a href="comment/input.php">input.php</a></li>
    <li>查看原始碼：表單輸入 [<a href="show_source.php?dir=comment&amp;file=input.php">input.php</a>]</li>
    <li>查看原始碼：結果存檔 [<a href="show_source.php?dir=comment&amp;file=save.php">save.php</a>]</li>
</ul>

<p>&nbsp;</p>


<h2>Class 04 (2024/08/13)</h2>
<p>上週補充：表單商品金額計算 (form_v5)</p>
    <ul>
        <li>(v5) 讀取定義檔，產生表單元件陣列<br>
        程式 [<a href="form_v5/list.php">執行</a>]
        查看原始碼：
        [<a href="show_source.php?dir=form_v5&amp;file=list.php">list.php</a>]
        [<a href="show_source.php?dir=form_v5&amp;file=calc.php">calc.php</a>]
        [<a href="show_source.php?dir=form_v5&amp;file=data.php">data.php</a>]
        </li>
    </ul>

<p>線上問卷調查 (survey)</p>
    <ul>
        <li>v1 程式執行 <a href="survey/v1/input.php">input.php</a> </li>
        <li>v2 程式執行 <a href="survey/v2/input.php">input.php</a> </li>
    </ul>

<p>&nbsp;</p>


<h2>Class 03 (2024/08/08)</h2>
<p>表單商品金額計算 (form_v...)</p>
    <ul>
        <li>(預備知識) 關於表單及表單元件</li>
        <li>(v1) 表單傳遞資料<br>
        程式 [<a href="form_v1/list.php">執行</a>]
        查看原始碼：
        [<a href="show_source.php?dir=form_v1&amp;file=list.php">list.php</a>]
        [<a href="show_source.php?dir=form_v1&amp;file=calc.php">calc.php</a>]
        </li>
        <li>(v2) 依折扣條件計算金額<br>
        程式 [<a href="form_v2/list.php">執行</a>]
        查看原始碼：
        [<a href="show_source.php?dir=form_v2&amp;file=list.php">list.php</a>]
        [<a href="show_source.php?dir=form_v2&amp;file=calc.php">calc.php</a>]
        </li>
        <li>(v3) 定義常數及隱藏欄位<br>
        程式 [<a href="form_v3/list.php">執行</a>]
        查看原始碼：
        [<a href="show_source.php?dir=form_v3&amp;file=list.php">list.php</a>]
        [<a href="show_source.php?dir=form_v3&amp;file=calc.php">calc.php</a>]
        </li>
        <li>(v4) 表單元件陣列用法 (復習)<br>
        程式 [<a href="form_v4/list.php">執行</a>]
        查看原始碼：
        [<a href="show_source.php?dir=form_v4&amp;file=list.php">list.php</a>]
        [<a href="show_source.php?dir=form_v4&amp;file=calc.php">calc.php</a>]
        </li>
    </ul>


<p>&nbsp;</p>






<h2>Class 02 (2024/08/06)</h2>
<p>商品清單及顯示 (product_v...)</p>
    <ul>
        <li>(預備知識) 關於陣列 note.php [<a href="product_v1/note.php">執行</a>]
        [<a href="show_source.php?dir=product_v1&amp;file=note.php">原始碼</a>]
    </li>
    <li>(v1) 網頁間傳遞資料<br>
        程式 [<a href="product_v1/list.php">執行</a>]
        查看原始碼：
        [<a href="show_source.php?dir=product_v1&amp;file=list.php">list.php</a>]
        [<a href="show_source.php?dir=product_v1&amp;file=display.php">display.php</a>]
    </li>
    <li>(v2) 用陣列表示資料<br>
        程式 [<a href="product_v2/list.php">執行</a>]
        查看原始碼：
        [<a href="show_source.php?dir=product_v2&amp;file=list.php">list.php</a>]
        [<a href="show_source.php?dir=product_v2&amp;file=display.php">display.php</a>]
    </li>
    <li>(v3) 較完整合理的寫法<br>
        程式 [<a href="product_v3/list.php">執行</a>]
        查看原始碼：
        [<a href="show_source.php?dir=product_v3&amp;file=list.php">list.php</a>]
        [<a href="show_source.php?dir=product_v3&amp;file=display.php">display.php</a>]
        [<a href="show_source.php?dir=product_v3&amp;file=data.php">data.php</a>]
    </li>
</ul>

<p>上週作業解答 (rand_pic)</p>
<ul>
    <li>程式執行 <a href="rand_pic/index.php">rand_pic/index.php</a></li>
</ul>

<p>&nbsp;</p>






<h2>Class 01 (2024/08/01)</h2>

<p>自我介紹 (intro)</p>
<ul>
    <li>第一支程式： [<a href="intro/first.php">執行</a>] [<a href="show_source.php?dir=intro&amp;file=first.php">查看原始碼</a>]</li>
</ul>

<p>幸運數字 (lucky)</p>
<ul>
    <li>Lucky Number <a href="lucky/index.php">index.php</a> [<a href="show_source.php?dir=lucky&amp;file=index.php">查看原始碼</a>]</li>
</ul>

<p>&nbsp;</p>



</body>
</html>