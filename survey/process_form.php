<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 接收表單變數
    $username = htmlspecialchars($_POST['username']);
    $birthday = htmlspecialchars($_POST['birthday']);
    $height = htmlspecialchars($_POST['height']);
    $weight = htmlspecialchars($_POST['weight']);
    
    // 顯示結果
    echo "<h2>表單提交結果</h2>";
    echo "<p><strong>姓名:</strong> " . $username . "</p>";
    echo "<p><strong>生日:</strong> " . $birthday . "</p>";
    echo "<p><strong>身高:</strong> " . $height . " cm</p>";
    echo "<p><strong>體重:</strong> " . $weight . " kg</p>";
} else {
    echo "表單未提交。";
}
?>
