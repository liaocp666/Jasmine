if (document.getElementById('jasmine-check-update')) {
    var container = document.getElementById('jasmine-check-update');
    var ajax = new XMLHttpRequest();
    ajax.open('get', 'https://api.github.com/repos/liaocp666/Jasmine/releases/latest');
    ajax.send();
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var obj = JSON.parse(ajax.responseText);
            if (versionCompare(jasmineVersion, obj.tag_name) == -1) {
                container.innerHTML =
                    '<h2>🎉 发现新版本！</h2>' +
                    '<a href="' + obj.assets[0].browser_download_url + '">点击下载（'+ obj.tag_name +'）</a><br/><h3>更新日志</h3>' +
                    '<p style="white-space: pre-wrap;">' + obj.body + '</p>';
            } else {
                container.innerHTML = '您目前使用的是最新版主题。';
            }
        }
    };
}

/**
 * 比较版本号
 * @param preVersion        前版本
 * @param lastVersion       最版本
 * @returns {number}
 */
function versionCompare(preVersion = '', lastVersion = '') {
    var sources = preVersion.split('.');
    var dests = lastVersion.split('.');
    var maxL = Math.max(sources.length, dests.length);
    var result = 0;
    for (let i = 0; i < maxL; i++) {
        let preValue = sources.length > i ? sources[i] : 0;
        let preNum = isNaN(Number(preValue)) ? preValue.charCodeAt() : Number(preValue);
        let lastValue = dests.length > i ? dests[i] : 0;
        let lastNum = isNaN(Number(lastValue)) ? lastValue.charCodeAt() : Number(lastValue);
        if (preNum < lastNum) {
            result = -1;
            break;
        } else if (preNum > lastNum) {
            result = 1;
            break;
        }
    }
    return result;
}