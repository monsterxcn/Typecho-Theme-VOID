<?php
/**
* QQ 接口
* Krait
* https://krait.cn/major/1888.html
* MonsterX Use It
*/
header("Access-Control-Allow-Origin: *");
header("Content-type: text/json; charset=UTF8");
if (!isset($_GET["qNum"]) || $_GET["qNum"] == null || !is_numeric($_GET["qNum"]) || strlen($_GET["qNum"]) < 5 || strlen($_GET["qNum"]) > 10)
    exit('Access Violation');
$object = $_GET["qNum"];
$apiInterface = 'https://r.qzone.qq.com/fcg-bin/cgi_get_score.fcg?mask=7&uins=' . $object;
$avaApi = 'https://ptlogin2.qq.com/getface?appid=1006102&uin=' . $object . '&imgtype=3';

function curlFileGetContents($_url)
{
    $myCurl = curl_init($_url);
    //不验证证书
    curl_setopt($myCurl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($myCurl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($myCurl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($myCurl, CURLOPT_HEADER, false);
    curl_setopt($myCurl, CURLOPT_REFERER, 'https://qzone.qq.com/');
    curl_setopt($myCurl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36');
    $content = curl_exec($myCurl);
    //关闭
    curl_close($myCurl);
    return $content;
}

try {
    $getAva = curlFileGetContents($avaApi);
    $ptAva = '/pt.setHeader\((.*)\)/is';
    preg_match($ptAva, $getAva, $rAva);
    $mdAva = json_decode($rAva[1], true)["$object"];

    $data = curlFileGetContents($apiInterface);
    $pattern = '/portraitCallBack\((.*)\)/is';
    preg_match($pattern, $data, $result);
    $nickname = json_decode($result[1], true)["$object"][6];

    $json = json_encode(
        array(
            "id" => $object,
            "nickname" => $nickname,
            "avatar_url" => $mdAva,
            "email" => $object . "@qq.com"
        ),
        JSON_UNESCAPED_UNICODE
    );
    echo $json;
} catch (Exception $e) {
    echo $e;
}