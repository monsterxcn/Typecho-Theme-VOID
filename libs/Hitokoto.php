<?php
/**
* Hitokoto 接口
* MonsterX Use It
*/
header('access-control-allow-origin:*');
header('Content-type: application/json; charset=UTF-8');
$array = file('hitokoto.txt');
$rand = rand(0,3379);
$string = $array[$rand];

$json = json_encode(
    array(
	    'code' => 200 ,
        'msg' => trim($string)
    ),
    JSON_UNESCAPED_UNICODE
);
echo "portraitCallBack(" . $json . ");";