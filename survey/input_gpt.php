<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>網頁問卷調查表單</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="date"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .range-output {
            font-weight: bold;
            margin-left: 10px;
        }
    </style>
</head>
<body>

    <h2>問卷調查表單</h2>

    <form action="process_form.php" method="post">
        <!-- 姓名 -->
        <div class="form-group">
            <label for="username">姓名<span style="color: red;">*</span>:</label>
            <input type="text" id="username" name="username" required>
        </div>

        <!-- 生日 -->
        <div class="form-group">
            <label for="birthday">生日:</label>
            <input type="date" id="birthday" name="birthday">
        </div>

        <!-- 身高 -->
        <div class="form-group">
            <label for="height">身高 (cm):</label>
            <input type="range" id="height" name="height" min="100" max="220" value="160" oninput="updateHeightValue(this.value)">
            <span class="range-output" id="heightOutput">160 cm</span>
        </div>

        <!-- 體重 -->
        <div class="form-group">
            <label for="weight">體重 (kg):</label>
            <input type="range" id="weight" name="weight" min="30" max="150" value="60" oninput="updateWeightValue(this.value)">
            <span class="range-output" id="weightOutput">60 kg</span>
        </div>

        <!-- 提交按鈕 -->
        <button type="submit">提交</button>
    </form>

    <script>
        function updateHeightValue(value) {
            document.getElementById('heightOutput').innerText = value + ' cm';
        }

        function updateWeightValue(value) {
            document.getElementById('weightOutput').innerText = value + ' kg';
        }
    </script>

</body>
</html>
