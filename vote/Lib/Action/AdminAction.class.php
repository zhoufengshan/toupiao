<?php
class AdminAction extends Action{
    public function getJson(){
        $cache = M("Cache");
        $res = $cache->field("access_token as token,jsapi_ticket as jsapi")->where("id = 1")->find();
        var_dump($cache);
        echo json_encode($res);
    }
}