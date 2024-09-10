// 定義 API URLs
const apiUrls = {
    list: 'http://localhost/myweb/db2_api_js/api/read.php',
    disp: 'http://localhost/myweb/db2_api_js/api/read_one.php',
    find: 'http://localhost/myweb/db2_api_js/api/read_find.php'
};

// 等待 DOM 加載完成後綁定事件
document.addEventListener('DOMContentLoaded', () => {

    // 綁定按鈕事件
    bindButton('btn_list', apiUrls.list, displayData);
    bindButton('btn_disp', apiUrls.disp, displayData, { paramName: 'uid' });
    bindButton('btn_find', apiUrls.find, displayData, { paramName: 'key' });

    function bindButton(buttonId, url, callback, options = {}) {
        document.getElementById(buttonId).addEventListener('click', () => {
            clearDisplay();

            let queryString = '';
            if (options.paramName) {
                const paramValue = encodeURIComponent(document.getElementById(options.paramName).value);
                queryString = `?${options.paramName}=${paramValue}`;
            }

            fetch(url + queryString)
                .then(response => response.ok ? response.json() : Promise.reject('Network response was not ok'))
                .then(data => callback(data))
                .catch(error => {
                    console.error('Fetch error:', error);
                    document.getElementById('message').textContent = '資料讀取發生錯誤';
                })
                .finally(() => {
                    document.getElementById('message').textContent += ' 資料讀取完畢';
                });
        });
    }

    function displayData(data) {
        const ary = data.records || []; // 如果 `data.records` 未定義，使用空陣列
        const totalRec = data.total_rec || 0;

        if (ary.length > 0) {
            console.log(ary[0]);
            document.getElementById('message').textContent = `資料已成功讀取 ${totalRec} 筆記錄`;
            document.getElementById('showarea').textContent = JSON.stringify(ary[0]);
            renderTable(ary);
        } else {
            document.getElementById('message').textContent = '未找到相關資料';
        }
    }

    function renderTable(ary) {
        const table = `
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
                    ${ary.map(item => `
                        <tr>
                            <td>${item.usercode || ''}</td>
                            <td>${item.username || ''}</td>
                            <td>${item.address || ''}</td>
                            <td>${item.birthday || ''}</td>
                            <td>${item.height || ''}</td>
                            <td>${item.weight || ''}</td>
                            <td>${item.remark || ''}</td>
                        </tr>
                    `).join('')}
                </tbody>
            </table>
        `;
        document.getElementById('tablelist').innerHTML = table;
    }

    function clearDisplay() {
        document.getElementById('tablelist').innerHTML = '';
        document.getElementById('showarea').innerHTML = '';
        document.getElementById('message').textContent = 'Loading...';
    }

});
