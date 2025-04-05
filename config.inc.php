<?php
/**
 * Typecho Blog Platform
 *
 * @copyright  Copyright (c) 2008 Typecho team (http://www.typecho.org)
 * @license    GNU General Public License 2.0
 * @version    $Id$
 */

/** 开启https */
define('__TYPECHO_SECURE__', true);

/** 定义根目录 */
define('__TYPECHO_ROOT_DIR__', dirname(__FILE__));

/** 定义插件目录(相对路径) */
define('__TYPECHO_PLUGIN_DIR__', '/usr/plugins');

/** 定义模板目录(相对路径) */
define('__TYPECHO_THEME_DIR__', '/usr/themes');

/** 后台路径(相对路径) */
define('__TYPECHO_ADMIN_DIR__', '/admin/');

/** 设置包含路径 */
@set_include_path(get_include_path() . PATH_SEPARATOR .
    __TYPECHO_ROOT_DIR__ . '/var' . PATH_SEPARATOR .
    __TYPECHO_ROOT_DIR__ . __TYPECHO_PLUGIN_DIR__);

/** 载入API支持 */
require_once 'Typecho/Common.php';

/** 程序初始化 */
Typecho_Common::init();

/** 定义数据库参数 */
$db = new Typecho_Db('Pdo_Mysql', 'typecho_');
$db->addServer(array(
    'host' => getenv('TYPECHO_DB_HOST'),
    'user' => getenv('TYPECHO_DB_USER'),
    'password' => getenv('TYPECHO_DB_PASSWORD'),
    'charset' => getenv('TYPECHO_DB_CHARSET') ?: 'utf8mb4',
    'port' => getenv('TYPECHO_DB_PORT') ?: 3306, // 修正默认端口为 3306
    'database' => getenv('TYPECHO_DB_DATABASE'),
    'engine' => getenv('TYPECHO_DB_ENGINE') ?: 'InnoDB',
    'sslCa' => getenv('TYPECHO_DB_SSL_CA') ? __TYPECHO_ROOT_DIR__ . '/' . getenv('TYPECHO_DB_SSL_CA') : null,
), Typecho_Db::READ | Typecho_Db::WRITE);

try {
    Typecho_Db::set($db);
    $db->query('SELECT 1');
    echo '数据库连接成功！';
} catch (Typecho_Db_Exception $e) {
    header('Content-Type: text/plain');
    echo 'Error establishing a database connection: ' . $e->getMessage() . 
         "\nCode: " . $e->getCode() . 
         "\nConfig: " . print_r($db->getConfig(), true);
    exit;
}
