<?php
/* db_pdo v1.0  @Shinjia  #2022/07/22 */

include 'config.php';
include 'utility.php';

// 接收傳入變數
$uid = isset($_GET['uid']) ? $_GET['uid'] : 0;

// 網頁內容預設
$ihc_content = '';
$ihc_error = '';

$a_json = array();

// 連接資料庫
$pdo = db_open();

// SQL 語法
$sqlstr = "SELECT * FROM person WHERE uid=?";

$sth = $pdo->prepare($sqlstr);
$sth->bindValue(1, $uid, PDO::PARAM_INT);

// 執行 SQL
try {
    $sth->execute();
    
    if($row = $sth->fetch(PDO::FETCH_ASSOC)) {
        $uid = $row['uid'];
        
        foreach($row as $key=>$value) {
            $a_json[$key] = html_encode($value); 
        }
        // $a_json['usercode'] = html_encode($row['usercode']);
        // $a_json['username'] = html_encode($row['username']);
        // $a_json['address']  = html_encode($row['address']);
        // $a_json['birthday'] = html_encode($row['birthday']);
        // $a_json['height']   = html_encode($row['height']);
        // $a_json['weight']   = html_encode($row['weight']);
        // $a_json['remark']   = html_encode($row['remark']);
    }
    else {
        // 查不到相關記錄！
    }
}
catch(PDOException $e) {
    // db_error(ERROR_QUERY, $e->getMessage());
    $ihc_error = error_message('ERROR_QUERY', $e->getMessage());
}

db_close();

$str_json = json_encode($a_json);


$js = <<< HEREDOC
<script>
function data_render() {

    var vjson = {$str_json};

    var s_usercode = vjson.usercode;
    var s_username = vjson.username;
    var s_address  = vjson.address;
    var s_birthday = vjson.birthday;
    var s_height   = vjson.height;
    var s_weight   = vjson.weight;
    var s_remark   = vjson.remark;
    
    var str = '';
    str += '<table border="1">';
    str += '<tr><td>' + s_usercode + '</td></tr>';
    str += '<tr><td>' + s_username + '</td></tr>';
    str += '<tr><td>' + s_address  + '</td></tr>';
    str += '<tr><td>' + s_birthday + '</td></tr>';
    str += '<tr><td>' + s_height   + '</td></tr>';
    str += '<tr><td>' + s_weight   + '</td></tr>';
    str += '<tr><td>' + s_remark   + '</td></tr>';
    str += '</table>';
console.log('running');
    document.getElementById('area_data').innerHTML = str;
}
</script>
HEREDOC;


//網頁顯示
$html = <<< HEREDOC
<h2>詳細資料</h2>

<h3>參考 JSON 的輸出</h3>
<div style="background-color:#FFEEAA; padding: 10px;">
{$str_json}
</div>

<h2>資料顯示</h2>

<div id="area_data">
</div>
{$ihc_error}

<script>data_render();</script>
HEREDOC;

include 'pagemake.php';
pagemake($html, $js);
?>