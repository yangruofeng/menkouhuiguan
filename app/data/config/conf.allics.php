<?php
/**
 * Created by PhpStorm.
 * User: sahara
 * Date: 2017/11/1
 * Time: 9:56
 */

$config['db_conf']=array(
    "db_loan"=>array(
        "db_type"=>"mysql",
        "db_host"=>"127.0.0.1",
        "db_user"=>"root",
        "db_pwd"=>"root",
        "db_name"=>"bank_live",
        "db_port"=>3306
    )
);



$config['session'] = array(
    'save_handler' => 'files',
    'save_path' => BASE_DATA_PATH.'/session'
);

$config['debug']=true;
$config['site_name'] = 'MENKOU';

$main_dir = 'menkouhuiguan';

$config['site_root'] = 'http://localhost/'.$main_dir;
$config['global_resource_site_url'] = "http://localhost/$main_dir/resource";
$config['project_site_url'] = 'http://localhost/'.$main_dir.'/app';

$config['entry_api_url'] = "http://localhost/$main_dir/app/api/v1";

$config['upload_site_url'] = 'http://localhost/'.$main_dir.'/app/data/upload';

$config['entry_root_url'] = 'http://localhost/'.$main_dir.'/entry';

$config['app_download_url'] = 'http://localhost/'.$main_dir.'/app/data/downloads';


$config['jpush_api'] = array(
    array(
        'entry_url' => 'https://api.jpush.cn/v3/push',
        'app_key' => '8578562ebb25934b28fe5403',
        'master_secret' => '0706273884e8ed7605db37d4'
    )
);


$config['api_google_map']='AIzaSyDCPjrMiBD6X2qMRS6EfqBzq_ZY37GGLUA';
$config['sms_api']='tencent';




