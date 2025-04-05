<?php
// site root path
define('__TYPECHO_ROOT_DIR__', dirname(__FILE__));

// plugin directory (relative path)
define('__TYPECHO_PLUGIN_DIR__', '/usr/plugins');

// theme directory (relative path)
define('__TYPECHO_THEME_DIR__', '/usr/themes');

// admin directory (relative path)
define('__TYPECHO_ADMIN_DIR__', '/admin/');

// register autoload
require_once __TYPECHO_ROOT_DIR__ . '/var/Typecho/Common.php';

// init
\Typecho\Common::init();

// 配置数据库连接信息（从环境变量获取）
$dbConfig = array (
    'host' => getenv('TYPECHO_DB_HOST'),
    'port' => getenv('TYPECHO_DB_PORT') ?: 4000,
    'user' => getenv('TYPECHO_DB_USER'),
    'password' => getenv('TYPECHO_DB_PASSWORD'),
    'charset' => getenv('TYPECHO_DB_CHARSET') ?: 'utf8mb4',
    'database' => getenv('TYPECHO_DB_DATABASE'),
    'engine' => getenv('TYPECHO_DB_ENGINE') ?: 'InnoDB',
    'sslCa' => getenv('TYPECHO_DB_SSL_CA') ? __TYPECHO_ROOT_DIR__ . '/' . getenv('TYPECHO_DB_SSL_CA') : null,
    'sslVerify' => getenv('TYPECHO_DB_SSL_VERIFY') === 'true',
);

// 只有当 sslCa 不为 null 时才检查文件是否存在
if ($dbConfig['sslCa'] !== null && !file_exists($dbConfig['sslCa'])) {
    die('错误：SSL CA 证书文件 ' . $dbConfig['sslCa'] . ' 不存在！请将 ' . getenv('TYPECHO_DB_SSL_CA') . ' 文件放在 index.php 所在的目录。');
}

// config db
$db = new \Typecho\Db('Pdo_Mysql', 'typecho_');
$db->addServer($dbConfig, \Typecho\Db::READ | \Typecho\Db::WRITE);

try {
    \Typecho\Db::set($db);
    // 可选：测试数据库连接是否成功
    // $db->query('SELECT 1');
    // echo '数据库连接成功！';
} catch (\Typecho\Db\Exception $e) {
    // 更详细的错误信息输出，便于调试
    die('Error establishing a database connection: ' . $e->getMessage() . 
        '<br>Config: ' . print_r($dbConfig, true));
}

// 可以在这里添加 Typecho 的后续初始化代码，例如处理请求等
