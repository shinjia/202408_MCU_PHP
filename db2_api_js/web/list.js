// 定義 API URL
const url = 'http://localhost/myweb/db2_api_js/api/read.php';

// 等待 DOM 加載完成後綁定按鈕事件
document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('btn');
    const messageElement = document.getElementById('message');
    const showArea = document.getElementById('showarea');
    const tableContainer = document.getElementById('tablelist');
    const sourceElement = document.getElementById('source');

    btn.addEventListener('click', () => {
        updateMessage('Loading...');
        clearDisplay();

        fetch(url)
            .then(handleFetchResponse)
            .then(data => {
                displayData(data.records);
            })
            .catch(handleFetchError)
            .finally(() => {
                updateMessage('資料讀取完畢', true);
            });
    });

    function handleFetchResponse(response) {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    }

    function handleFetchError(error) {
        console.error('Fetch error:', error);
        updateMessage('資料讀取發生錯誤');
    }

    function updateMessage(message, append = false) {
        messageElement.textContent = append ? `${messageElement.textContent} ${message}` : message;
    }

    function clearDisplay() {
        showArea.textContent = '';
        tableContainer.innerHTML = '';
    }

    function displayData(records) {
        if (!records || records.length === 0) {
            updateMessage('未找到相關資料');
            return;
        }

        console.log(records[0]);
        updateMessage('資料已成功讀取');
        showArea.textContent = JSON.stringify(records[0]);
        renderTable(records);
    }

    function renderTable(records) {
        const rows = records.map(item => createTableRow(item)).join('');
        tableContainer.innerHTML = `
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
                    ${rows}
                </tbody>
            </table>
        `;
    }

    function createTableRow(item) {
        return `
            <tr>
                <td>${item.usercode || ''}</td>
                <td>${item.username || ''}</td>
                <td>${item.address || ''}</td>
                <td>${item.birthday || ''}</td>
                <td>${item.height || ''}</td>
                <td>${item.weight || ''}</td>
                <td>${item.remark || ''}</td>
            </tr>
        `;
    }

    // 設置來源 URL
    sourceElement.innerHTML = `<a href="${url}">${url}</a>`;
});
