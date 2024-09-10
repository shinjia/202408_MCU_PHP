<?php
header('Content-Type: application/json'); // 設定回傳類型為JSON
$uploadDir = 'uploads/';
$response = ['messages' => []];

foreach ($_FILES['file']['tmp_name'] as $key => $tmpName) {
    if ($_FILES['file']['error'][$key] === UPLOAD_ERR_OK) {
        $name = $_FILES['file']['name'][$key];
        $filename = $uploadDir . basename($name);
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true); // 確保目錄存在
        }
        if (move_uploaded_file($tmpName, $filename)) {
            array_push($response['messages'], "檔案 {$name} 上傳成功。");
        } else {
            array_push($response['messages'], "檔案 {$name} 上傳失敗。");
        }
    } else {
        array_push($response['messages'], "錯誤: " . $_FILES['file']['error'][$key]);
    }
}

echo json_encode($response);
?>
