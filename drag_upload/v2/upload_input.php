<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>文件上傳與預覽</title>
    <style>
        #drop_zone {
            border: 2px dashed #ccc;
            padding: 20px;
            text-align: center;
        }
        #preview_zone {
            margin-top: 10px;
            display: flex;
            flex-wrap: wrap;
            justify-content: start;
        }
        #show_zone {
            margin-top: 20px;
            color: green;
        }
        img {
            width: 100px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .file-container {
            margin: 10px;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #f9f9f9;
            position: relative; /* Allows absolute positioning of the remove button */
        }
        .delete-btn {
            cursor: pointer;
            color: white;
            font-weight: bold;
            font-size: 12px;
            background-color: #ff4d4d; /* Red background */
            border: none;
            padding: 5px 6px;
            border-radius: 5px;
            position: absolute;
            top: 10px;
            right: 10px;
        }
        .file-info {
            margin-top: 20px; /* Give space for the button */
            font-size: 14px;
        }
        .img-container {
            display: flex;
            justify-content: center;
            width: 100%;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div id="drop_zone">拖動檔案到這裡或 <input type="file" id="file_input" multiple accept="image/*,application/pdf"></input></div>
    <button onclick="uploadFiles()">上傳檔案</button>
    <div id="preview_zone"></div>
    <div id="show_zone"></div>
    <script>
        let dropZone = document.getElementById('drop_zone');
        let previewZone = document.getElementById('preview_zone');
        let showZone = document.getElementById('show_zone');
        let fileInput = document.getElementById('file_input');

        let files = [];

        dropZone.addEventListener('dragover', (event) => {
            event.preventDefault();
        });

        dropZone.addEventListener('drop', (event) => {
            event.preventDefault();
            addFiles(event.dataTransfer.files);
        });

        fileInput.addEventListener('change', () => {
            addFiles(fileInput.files);
        });

        function addFiles(newFiles) {
            newFiles = Array.from(newFiles);
            newFiles.forEach(file => {
                if (!files.some(f => f.name === file.name && f.size === file.size && f.lastModified === file.lastModified)) {
                    files.push(file);
                    displayFile(file, files.length - 1);
                }
            });
        }

        function displayFile(file, index) {
            const reader = new FileReader();
            reader.onload = (e) => {
                const fileDiv = document.createElement('div');
                fileDiv.className = 'file-container';

                const deleteBtn = document.createElement('button');
                deleteBtn.textContent = '移除';
                deleteBtn.className = 'delete-btn';
                deleteBtn.onclick = () => removeFile(index);

                const fileInfo = document.createElement('div');
                fileInfo.textContent = `待上傳: ${file.name}`;
                fileInfo.className = 'file-info';

                const imgContainer = document.createElement('div');
                imgContainer.className = 'img-container';

                if (file.type.startsWith('image/')) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    imgContainer.appendChild(img);
                }

                fileDiv.appendChild(deleteBtn);
                fileDiv.appendChild(fileInfo);
                fileDiv.appendChild(imgContainer);
                previewZone.appendChild(fileDiv);
            };
            reader.readAsDataURL(file);
        }

        function removeFile(index) {
            files.splice(index, 1); // 移除檔案
            updateShowZone(); // 更新顯示區
        }

        function updateShowZone() {
            previewZone.innerHTML = '';
            files.forEach((file, index) => {
                displayFile(file, index);
            });
        }

        function uploadFiles() {
            const formData = new FormData();
            files.forEach(file => {
                formData.append('file[]', file);
            });

            fetch('upload_save.php', {
                method: 'POST',
                body: formData,
            })
            .then(response => response.json())
            .then(result => {
                showZone.innerHTML = '';
                result.messages.forEach(msg => {
                    const message = document.createElement('div');
                    message.textContent = msg;
                    showZone.appendChild(message);
                });
            })
            .catch(error => {
                console.error('Error:', error);
                showZone.innerHTML = `錯誤: ${error}`;
            });
        }
    </script>
</body>
</html>
