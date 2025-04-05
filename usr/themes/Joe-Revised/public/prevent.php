<?php
/**
 * 防止在QQ、微信打开（防红）
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

/* 判断是否为微信 */

function isWechat()
{
    $flag = false;
    if (isset($_SERVER['HTTP_USER_AGENT']) && strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false) {
        $flag = true;
    }
    //安卓微信特有
    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == "com.tencent.mm") {
        $flag = true;
    }
    return $flag;
}

/*判断是否为QQ*/

function isQQ()
{
    $flag = false;
    if (isset($_SERVER['HTTP_USER_AGENT']) && strpos($_SERVER['HTTP_USER_AGENT'], 'QQ/') !== false) {
        $flag = true;
    }

    //IOS QQ特有
    if (isset($_SERVER['HTTP_QZHW_WNSHTML_WEBVIEWSUPPORT']) || isset($_SERVER['HTTP_QZHW_REQUEST_KEY'])) {
        $flag = true;
    }

    return $flag;
}

if (Helper::options()->JPrevent == 'on') {
    if (isWechat() || isQQ()) {
        require JOE_ROOT . 'module/jump.php';
        exit;
    }
}