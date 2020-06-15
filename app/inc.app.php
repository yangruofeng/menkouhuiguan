<?php
/**
 * Created by PhpStorm.
 * User: tim
 * Date: 5/1/2015
 * Time: 8:26 PM
 */
//初始化yo
require_once(BASE_CORE_PATH . "/ormYo.php");
require_once(BASE_CORE_PATH . "/Yo.php");
$dsn = $GLOBALS['config']['db_conf'];//getConf('db_conf');
ormYo::setup($dsn);
ormYo::$default_db_key = "db_loan";
ormYo::$lang_current = "en";
ormYo::$freez = !$GLOBALS['config']['debug'];//==true;//是否冻结
ormYo::$log_path = _LOG_;//日志路径
//ormYo::$IDField="uid";//表的自增列
ormYo::$schema_path = _DATA_SCHEMA_ . "/";//datasource保存路径
ormYo::$lang_a = getLangTypeList();

require_once(_APP_COMMON_ . "/um.php");
require_once(_APP_COMMON_ . "/define_enum.php");
require_once(_APP_COMMON_ . "/root.control.php");
require_once(_APP_COMMON_ . "/function.php");
//需要load的特殊放在这里
global $config;

define('GLOBAL_RESOURCE_SITE_URL', $config['global_resource_site_url']);
define('PROJECT_SITE_URL', $config['project_site_url'] . DS . 'entry_desktop');
define('LITE_URL', $config['project_site_url'] . DS . 'lite');
define('ENTRY_DESKTOP_SITE_URL', $config['project_site_url'] . DS . 'entry_desktop');
define('BACK_OFFICE_SITE_URL', $config['project_site_url'] . DS . 'backoffice');
define('OPERATOR_SITE_URL', $config['project_site_url'] . DS . 'operator');
define('BORROWER_SITE_URL', $config['project_site_url'] . DS . 'borrower');
define('ENTRY_COUNTER_SITE_URL', $config['project_site_url'] . DS . 'counter');
define('FINANCE_SITE_URL', $config['project_site_url'] . DS . 'finance');
define('REPORT_SITE_URL', $config['project_site_url'] . DS . 'report');
define('HELPER_SITE_URL', $config['project_site_url'] . DS . 'helper');
define('HR_SITE_URL', $config['project_site_url'] . DS . 'hr');
define('DEV_SITE_URL', $config['project_site_url'] . DS . 'dev');
define('ENTRY_API_SITE_URL', $config['project_site_url'] . DS . 'api/v2');
define('PROJECT_RESOURCE_SITE_URL', $config['project_site_url'] . DS . 'resource');
define('CURRENT_RESOURCE_SITE_URL',"resource"); // 直接使用resource目录
define('WAP_SITE_URL', $config['project_site_url'] . DS . 'wap');
define('DOWNLOAD_SITE_URL', $config['project_site_url'] . DS . 'download');
define('WAP_OPERATOR_SITE_URL', $config['project_site_url'] . DS . 'wap_operator');
define('SCRIPT_SITE_URL',$config['project_site_url'].'/script');
//define('OPERATOR_SITE_URL', $config['project_site_url'].DS.'operator');
define('API_SITE_URL', $config['project_site_url'] . DS . 'api');

define('UPLOAD_SITE_URL', $config['project_site_url'].DS.'data'.DS.'upload');
define('UPYUN_SITE_URL', $config['upyun_param']['upyun_url']);
define('UPYUN_URL', $config['upyun_param']['upyun_url']);

define('TEST_SITE_URL', $config['project_site_url'] . DS . 'test');

define('ALIYUN_OSS_URL',$config['aliyun_oss_url']);

define("CURRENT_APP", explode('/', dirname($_SERVER['PHP_SELF']))[2]);

if ($config['cookie_domain']) {
    ini_set('session.cookie_domain', $config['cookie_domain']);
}
ini_set("memory_limit", "-1");
