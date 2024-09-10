// 定義 API URL
const url = 'http://localhost/myweb/db2_api_js/api/read_find.php';

// 綁定按鈕點擊事件
document.getElementById('btn').addEventListener('click', function() {
    const messageElement = document.getElementById('message');
    const key = document.getElementById('key').value;

    // 顯示載入訊息
    messageElement.textContent = 'Loading...';

    // 發送 GET 請求
    fetch(`${url}?key=${encodeURIComponent(key)}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            const records = data.records;
            if (records && records.length > 0) {
                console.log(records[0]);
                messageElement.textContent = '資料已成功讀取';
                document.getElementById('showarea').textContent = JSON.stringify(records[0]);
                renderTable(records);
            } else {
                messageElement.textContent = '未找到相關資料';
            }
        })
        .catch(error => {
            console.error('Fetch error:', error);
            messageElement.textContent = '資料讀取發生錯誤';
        })
        .finally(() => {
            messageElement.textContent += ' | 資料讀取完畢';
        });
});

// 渲染表格
function renderTable(records) {
    const tableList = document.getElementById('tablelist');
    tableList.innerHTML = `
        <table class="data-table">
            <thead>
                <tr>
                    <th>Usercode</th>
                    <th>Username</th>
                    <th>Address</th>
                    <th>Birthday</th>
                    <th>Height</th>
                    <th>Weight</th>
                    <th>Remark</th>
                </tr>
            </thead>
            <tbody>
                ${records.map(record => `
                    <tr>
                        <td>${record.usercode || ''}</td>
                        <td>${record.username || ''}</td>
                        <td>${record.address || ''}</td>
                        <td>${record.birthday || ''}</td>
                        <td>${record.height || ''}</td>
                        <td>${record.weight || ''}</td>
                        <td>${record.remark || ''}</td>
                    </tr>
                `).join('')}
            </tbody>
        </table>
    `;
}

// 設置來源連結
document.getElementById('source').innerHTML = `<a href="${url}">${url}</a>`;
