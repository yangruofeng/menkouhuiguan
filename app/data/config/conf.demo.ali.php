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
        "db_pwd"=>"Ace-2015",
        "db_name"=>"bank_live_20200409",    //
        "db_port"=>3306
    )
);

// 暂时使用
$config['session'] = array(
    'save_handler' => 'files',
    'save_path' => BASE_DATA_PATH.'/session'
);

$config['debug']=true;

if ( !empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off') {
    $protocol = "https";
} elseif ( isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https' ) {
    $protocol = "https";
} elseif ( !empty($_SERVER['HTTP_FRONT_END_HTTPS']) && strtolower($_SERVER['HTTP_FRONT_END_HTTPS']) !== 'off') {
    $protocol = "https";
} elseif ($_SERVER['HTTP_X_AUTO_CERT_PROXY'] === '1') {
    $protocol = "https";
} else {
    $protocol = "http";
}

$config['site_root'] = "$protocol://demo.samrithisak.com";
$config['global_resource_site_url'] = "$protocol://demo.samrithisak.com/resource";
$config['project_site_url'] = "$protocol://demo.samrithisak.com/microbank";
$config['app_download_url'] = "$protocol://demo.samrithisak.com/microbank/data/downloads";
$config['entry_api_url'] = "$protocol://demo.samrithisak.com/microbank/api/v1";

$config['app_download_url'] = 'https://xxbanking-demo.oss-cn-hongkong.aliyuncs.com/APK'; // 固定地址和协议

$config['agreen_mall_url'] = "http://demo.agreenmall.com/agreen/mobile_shop";

$config['asiaweiluy_api'] = array(
    'entry_url' => 'https://alpha-api.asiaweiluy.com/gateway.php',
    'partner_id' => '8888',
    'partner_key' => 'MuXi7Yr3wKpiVxu4QpiY'
);

$config['jpush_api'] = array(
    array(
        'entry_url' => 'https://api.jpush.cn/v3/push',
        'app_key' => '8578562ebb25934b28fe5403',
        'master_secret' => '0706273884e8ed7605db37d4'
    )
);

// 是否开启重置系统开关
$config['is_open_reset_system'] = 0;

$config['member_set_trading_password_way'] = 1;  // 0 登陆密码+身份证尾号  1 登陆密码+短信验证码

$config['sms_api']='tencent';


$config['cbc_enquiry_api'] = array(
    'API_URL' => 'https://uat-pr.creditbureau.com.kh/enquiry/inthttp.pgm',
    'MEMBER_ID' => '246',
    'USER_ID' => 'SRTUATXML',
    'RUN_NO' => '5',
    'TOT_ITEMS' => '1',
);

$config['member_app_ios_download_url'] = 'https://itunes.apple.com/cn/app/id1436948494?mt=8';

$config['tencent_video_api'] = array(
    'account_id' => '100006848143',
    'SecretId' => 'AKIDTC4i7TqgMvaZNxc1psNelw7ZrjNrI2Kc',
    'SecretKey' => 'TsiJAzkUHwZS81uNiCAJoNvVfyHQL1XT'
);

$config['face_search_api'] = array(
    'api_url' => 'http://ai.khbuy.com/business/api/v1/',
    'app_id' => '1',
    'app_key'=> '9184fefd-17d9-11ea-81aa-ccb0daf5504e'
);



