<?php
include '../common/config.php';
include '../common/define.php';
include '../common/utility.php';

// 可接收 GET 及 POST 傳入
$key = $_POST['key'] ?? ($_GET['key']??'^$!@#');

$str_key = '查詢姓名內包含『' . $key . '』的記錄';

// 頁碼參數
$page = $_GET['page'] ??  1;   // 目前的頁碼
$nump = $_GET['nump'] ?? 10;   // 每頁的筆數

// 增加傳入 uid，把該筆記錄高亮標示
$uid_highlight = $_GET['uid'] ?? '';

// 參數安全檢查
$page = intval($page);  // 轉為整數
$nump = intval($nump);  // 轉為整數
$page = ($page<=0) ? 1 : $page;  // 不可為零
$nump = ($nump<=0) ? 10 : $nump;  // 不可為零

// 網頁內容預設
$ihc_content = '';
$ihc_error = '';

// 變數設定
$total_rec = 0;
$total_page = 0;

// 連接資料庫
$pdo = db_open();

// SQL 語法：條件
$sql_where = " WHERE username LIKE ? ";  // 依條件修改
$keyword = '%' . $key . '%';  // 注意

// SQL 語法：取得分頁所需之資訊 (總筆數、總頁數、擷取記錄之起始位置)
$sqlstr = "SELECT count(*) as total_rec FROM person ";
$sqlstr .= $sql_where;

$sth = $pdo->prepare($sqlstr);
$sth->bindValue(1, $keyword, PDO::PARAM_STR);

// 執行 SQL
try {
    $sth->execute();
    if($row = $sth->fetch(PDO::FETCH_ASSOC)) {
        $total_rec = $row["total_rec"];
    }
    $total_page = ceil($total_rec / $nump);  // 計算總頁數
}
catch(PDOException $e) {
    $ihc_error = error_message(ERROR_QUERY, $e->getMessage());
}

$page = ($page<=$total_page) ? $page : $total_page;  // 頁數超過時，維持在最後一頁
$page = ($page<=0) ? 1 : $page;

// SQL 語法：分頁資訊
$sqlstr = "SELECT * FROM person ";
$sqlstr .= $sql_where;
$sqlstr .= " LIMIT " . (($page-1)*$nump) . "," . $nump;

$sth = $pdo->prepare($sqlstr);

$sth = $pdo->prepare($sqlstr);
$sth->bindValue(1, $keyword, PDO::PARAM_STR);

// 執行 SQL
try { 
    $sth->execute();

    $cnt = (($page-1)*$nump);  // 注意分頁的起始順序
    $data = '';
    while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
        $uid = $row['uid'];
        $usercode = html_encode($row['usercode']);
        $username = html_encode($row['username']);
        $address  = html_encode($row['address']);
        $birthday = html_encode($row['birthday']);
        $height   = html_encode($row['height']);
        $weight   = html_encode($row['weight']);
        $remark   = html_encode($row['remark']);
    
        $cnt++;

        // 指定的 uid 記錄高亮顯示
        $str_highlight = '';
        if($uid==$uid_highlight) {
            $str_highlight = 'class="hightlight table-warning"';
        }

        // 超連結
        $lnk_display = 'display.php?uid=' . $uid . '&page=' . $page . '&nump=' . $nump;
        $lnk_edit = 'edit.php?uid=' . $uid . '&page=' . $page . '&nump=' . $nump;
        $lnk_delete = 'delete.php?uid=' . $uid . '&page=' . $page . '&nump=' . $nump;

        $data .= <<< HEREDOC
            <tr {$str_highlight}>
            <th class="table-secondary text-center">{$cnt}</th>
            <td>{$usercode}</td>
            <td>{$username}</td>
            <td>{$address}</td>
            <td>{$birthday}</td>
            <td>{$height}</td>
            <td>{$weight}</td>
            <td>{$remark}</td>
            <td class="table-secondary" style="width: 1%; white-space:nowrap;">
                <a href="{$lnk_display}" class="btn btn-info btn-sm">詳細</a>
                <a href="{$lnk_edit}" class="btn btn-warning btn-sm">修改</a>
                <a href="{$lnk_delete}" class="btn btn-danger btn-sm" onClick="return confirm('確定要刪除嗎？');">刪除</a>
            </td>
        </tr>
HEREDOC;
    }

    // 分頁導覽列
    $a_ext = array(
        "key"=>$key
    );
    $ihc_pagination = pagination_ext($total_rec, $total_page, $page, $nump, $a_ext);
    
    $lnk_add = 'add.php?page=' . $page . '&nump=' . $nump;

    //網頁顯示
    $ihc_content = <<< HEREDOC
    <nav>
        {$ihc_pagination}
    </nav>
    <table class="table table-hover">
        <tr class="table-secondary">
            <th class="text-center">順序</th>
            <th>代碼</th>
            <th>姓名</th>
            <th>地址</th>
            <th>生日</th>
            <th>身高</th>
            <th>體重</th>
            <th>備註</th>
            <th class="text-center"><a href="{$lnk_add}" class="btn btn-success btn-sm">新增記錄</a></th>
        </tr>
    {$data}
    </table>
HEREDOC;

    // 找不到資料時
    if($total_rec==0) { $ihc_content = '<p class="center">無資料</p>';}
}
catch(PDOException $e) {
    $ihc_error = error_message('ERROR_QUERY', $e->getMessage());
}

db_close();


$html = <<< HEREDOC
<h3 class="text-center">{$str_key}</h3>
{$ihc_content}
{$ihc_error}
HEREDOC;

include 'pagemake.php';
pagemake($html);
?>