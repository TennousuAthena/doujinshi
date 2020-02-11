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
$dataFileName = __DIR__ . DIRECTORY_SEPARATOR. "data" . DIRECTORY_SEPARATOR . "keys.php";
if(!file_exists($dataFileName)) {
    file_put_contents($dataFileName, "<?php \n//默认会生成一个KEY，您可以任意添加KEY\n \$KEYS = \n[\n   '" . generateRandomString(16) . "' => '" . generateRandomString(32) . "'\n];");
}
require_once ("data/keys.php");
$IS_LOGIN = false;
if(@$_COOKIE['PK']!==null && @$_COOKIE['UUID'] !== null){
    $userPK = @$_COOKIE['PK'];
    $ExpireTime = @$_COOKIE['ExpireTime'];
    $userResult = @$_COOKIE['UUID'];
    $actualResult = cauclateAuthCode($userPK, $KEYS[$userPK], $ExpireTime);
    if($userResult === $actualResult){
        $IS_LOGIN = true;
    }
}