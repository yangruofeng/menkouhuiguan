<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 9/14/2018
 * Time: 1:46 PM
 */
class rootControl extends control{
    //目的是因为现在的各个project里没有共同的可调用的基类 ，最基本的control不可对外调用

    protected  function checkAdminSecurity($user_position)
    {

        // 开放的情况下，检查职位设置
        $position_setting = global_settingClass::getClientLoginLimitDictionary();
        if( $position_setting[$user_position] ){
            return true;
        }else{
            if( !systemSettingClass::isAdminCanLoginExceptClient() ){
                return $_COOKIE['SITE_PRIVATE_KEY'] == md5(date("Ydm"));
            }else{
                return true;
            }
        }

    }

    protected function checkCounterSecurity($user_position)
    {
        // 开放的情况下，检查职位设置
        $position_setting = global_settingClass::getClientLoginLimitDictionary();
        if( $position_setting[$user_position] ){
            return true;
        }else{
            if( !systemSettingClass::isCounterCanLoginExceptClient() ){
                return $_COOKIE['SITE_PRIVATE_KEY'] == md5(date("Ydm"));
            }else{
                return true;
            }
        }
    }

}