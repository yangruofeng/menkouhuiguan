<?php
defined('InKHBuy') or exit('Access Invalid!');

$config['db_conf']=array(
    "db_local"=>array(
        "db_type"=>"mysql",
        "db_host"=>"localhost",
        "db_user"=>"root",
        "db_pwd"=>"root",
        //"db_name"=>"microbank",
        "db_name"=>"bank_live",
        "db_port"=>3306
    ),
    "db_remote" => array(
        "db_type"=>"mysql",
        //"db_host"=>"47.88.189.36",
        "db_host"=>"47.244.91.23",
        "db_user"=>"demo",
        "db_pwd"=>"Ace-2015",
        "db_name"=>"bank_dev",
        "db_port"=>3306
    )
);
$config['author'] = "zxz";
$config['author_password'] = '528efe53c136f73680f2869f97132b94';
$config['debug']=true;
$config['session'] = array(
    'save_handler' => 'files',
    'save_path' => BASE_DATA_PATH . DS . "session"
);

//$config['global_resource_site_url'] = "http://local.khbuy.com/microbank/resource";
$config['global_resource_site_url'] = "http://localhost/microbank/resource";