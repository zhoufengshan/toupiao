<?php
/**
 * Created by PhpStorm.
 * User: lcw
 * Date: 2016/6/13
 * Time: 9:43
 */
function getSignature($jsapi_ticket,$noncestr,$timestamp,$url){
    $urlObj['jsapi_ticket'] = $jsapi_ticket;
    $urlObj['noncestr'] = $noncestr;
    $urlObj['timestamp'] = $timestamp;
    $urlObj['url'] = $url;
    ksort($urlObj);
    $string = urlParam($urlObj);
    return sha1($string);
}
var_dump(getSignature('aaa','bbb','ccc','ddd'));
function urlParam($urlObj){
    $buff = '';
    foreach ($urlObj as $key => $val){
        $buff .= $key.'='.$val.'&';
    }
    return trim($buff,'&');
}
echo $str = "tn=monline_dg&ie=utf-8&bs=httpbuildurl&f=3&rsv_bp=1&wd=php+buildquery&rsv_sug3=17&rsv_sug4=330&rsv_sug1=16&oq=php+build&rsv_sug2=0&rsp=0&inputT=8922";
parse_str($str,$arr);
var_dump($arr);
echo http_build_query($arr);