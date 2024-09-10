<?php
// API URL
$url = 'https://data.moenv.gov.tw/api/v2/aqx_p_432?format=json&limit=50&api_key=3c601de0-872a-4d2b-83fa-899ba7ad6663';

// 初始化 cURL
$ch = curl_init();

// 設置 cURL 選項
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // 將回應作為字串返回而不是直接輸出
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 驗證 SSL 憑證
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2); // 驗證主機憑證

// 設置 CA 憑證的路徑
// curl_setopt($ch, CURLOPT_CAINFO, "E:/xampp/apache/bin/cacert.pem"); // 指定 CA 憑證的路徑

// 執行 cURL 並獲取回應
$response = curl_exec($ch);

// 檢查是否有錯誤
if (curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
    exit;
}

// 關閉 cURL
curl_close($ch);

// 將 JSON 資料轉換為 PHP 陣列
$data = json_decode($response, true);

// 檢查資料是否成功取得
if (!$data) {
    echo '<p>資料讀取發生錯誤</p>';
    exit;
}

// 取得資料陣列中的 "records" 部分
$records = $data['records'];


$data = '<table>';
foreach ($records as $item) {
    $sitename = htmlspecialchars($item['sitename']);
    $aqi      = htmlspecialchars($item['aqi']);
    $status   = htmlspecialchars($item['status']);
    $publishtime = htmlspecialchars($item['publishtime']);

    $data .= <<< HEREDOC
    <tr>
        <td>{$sitename}</td>
        <td>{$aqi}</td>
        <td>{$status}</td>
        <td>{$publishtime}</td>
    </tr>
HEREDOC;
}
$data .= '<table>';


$html = <<< HEREDOC
<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>空氣品質資料</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>

<h2>[環保署] 空氣品質資料</h2>

<p>來源：<a href="{$url}">{$url}</a></p>

<p>讀入資料清單</p>
<table>
    <thead>
        <tr>
            <th>測站名稱</th>
            <th>AQI</th>
            <th>狀態</th>
            <th>發布時間</th>
        </tr>
    </thead>
    <tbody>
{$data}
    </tbody>
</table>

</body>
</html>
HEREDOC;

echo $html;
?>