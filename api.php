<?php
/*
 *  ____             ______
 * | __ )  ___ _ __ |__  (_)
 * |  _ \ / _ \ '_ \  / /| |
 * | |_) |  __/ | | |/ /_| |
 * |____/ \___|_| |_/____|_|
 * 阅本无数
 */
require_once ("libs.php");
require_once ("config.php");
$mode = @$_GET['mode'] ? $_GET['mode'] : "";
switch ($mode){
    case 'benzi':{
        $id = (int)$_GET['id'];
        $page = (int)$_GET['page'];
        header("Content-Type: image/png; charset=utf-8");
        $cache_file_dir = __DIR__ . DIRECTORY_SEPARATOR. "cache" . DIRECTORY_SEPARATOR . "{$id}". DIRECTORY_SEPARATOR;
        if(!file_exists($cache_file_dir)){
            mkdir($cache_file_dir);
        }
        $benzi = file_get_contents("{$CONFIG['NHENTAI_DOMAIN']}/galleries/{$id}/{$page}.jpg",true);
        if(!file_exists($cache_file_dir . $page . ".png")){
            file_put_contents($cache_file_dir . $page . ".png", $benzi);
        }else{
            echo file_get_contents($cache_file_dir . $page . ".png");
        }
        exit($benzi);
    }

}
