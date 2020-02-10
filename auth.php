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
//判断是否在Shell中
$dataFileName = __DIR__ . DIRECTORY_SEPARATOR. "data" . DIRECTORY_SEPARATOR . "keys.php";
if(!file_exists($dataFileName)) {
    file_put_contents($dataFileName, "<?php \n \$KEYS = \n[\n   '" . generateRandomString(32) . "'\n];");
}