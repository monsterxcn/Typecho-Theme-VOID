/* eslint-disable linebreak-style */
/* eslint-disable no-undef */
if (document.getElementById('void-check-update')) {
    var container = document.getElementById('void-check-update');
    var ajax = new XMLHttpRequest();
    ajax.open('get', 'https://api.github.com/repos/monsterxcn/Typecho-Theme-VOID/releases/latest');
    ajax.send();
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var obj = JSON.parse(ajax.responseText);
            var newest = parseFloat(obj.tag_name);
            if (newest > VOIDVersion) {
                container.innerHTML =
                    '发现新主题版本：' + obj.name +
                    '。<a href="https://gh.msx.workers.dev/' + obj.assets[0].browser_download_url + '">点击下载</a> / ' +
                    '<a target="_blank" href="' + obj.html_url + '">新版亮点</a>' + 
                    '<br>您目前的版本：VOID ' + String(VOIDVersion) + '。';
            } else {
                container.innerHTML = '您目前使用的是最新版主题。';
            }
        }
    };
}