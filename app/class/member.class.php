<?php
class memberClass
{
    public static function registerMemberByOpenID($open_id,$unionid=null)
    {
        $m = new memberModel();
        $member = $m->find(array(
            'open_id' => $open_id
        ));
        if( $member ){
            return new result(true,'success',$member);
        }
        $member = $m->newRow();
        $member->open_id = $open_id;
        $member->unionid = $unionid;
        $member->create_time = Now();
        $rt = $member->insert();
        if( !$rt->STS ){
            return $rt;
        }
        return new result(true,'success',$member->toArray());
    }
    public static function loginByWechat($params)
    {
        $code = $params['code'];
        $wx_config = getConf('wx_config');
        if( empty($wx_config) ){
            return new result(false,'小程序配置为空');
        }
        if (!$code) {
            return new result(false, 'CODE为空');
        }
        $wx_params = array(
            'js_code' => trim($code),
            'appid' => $wx_config["appId"],
            'secret' => $wx_config["appKey"],
            'grant_type' => 'authorization_code',
        );

        //api接口 如使用地方较多提取到配置文件
        $api = "https://api.weixin.qq.com/sns/jscode2session?";
        $api .= http_build_query($wx_params);
        //发送
        $rt_str = curl_get_https($api);
        $rt_arr = json_decode($rt_str, true);
        if ($rt_arr['errcode'] != 0) {
            return new result(false, $rt_arr['errMsg'], $params, $rt_arr['errcode']);
        }

        $wx_openId = $rt_arr['openid'];
        $session_key = $rt_arr['session_key'];
        $unionid = $rt_arr['unionid'];

        //账号注册
        $rt = self::registerMemberByOpenID($wx_openId,$unionid);
        if( !$rt->STS ){
            return $rt;
        }
        $member_info = $rt->DATA;
        $return_member_info = self::getLoginMemberInfo($member_info['uid']);

        //生成token
        $m_member_token = new member_tokenModel();
        $rt = $m_member_token->insertToken($member_info['uid']);
        if (!$rt->STS) {
            return $rt;
        }
        $token = $rt->DATA;
        return new result(true,'success',array(
            'member_info' => $return_member_info,
            'token' => $token
        ));
    }

    // 获取返回给前端的登录用户信息
    public static function getLoginMemberInfo($member_id)
    {
        $m = new memberModel();
        $member = $m->find($member_id);
        return $member;
    }

    public static function updateMemberUserInfo($member_id,$userInfo)
    {
        $m = new memberModel();
        $member = $m->getRow($member_id);
        if( !$member ){
            return new result(false,'Invalid member id:'.$member_id);
        }
        if( $member->is_auth ){
            return new result(true,'success');
        }
        $member->nick_name = $userInfo['nickName'];
        $member->avatar_url = $userInfo['avatarUrl'];
        $member->gender = $userInfo['gender'];
        $member->country = $userInfo['country'];
        $member->province = $userInfo['province'];
        $member->city = $userInfo['city'];
        $member->is_auth = 1;
        $member->update_time = Now();
        $member->last_info_time = Now();
        $rt = $member->update();
        if( !$rt->STS ){
            return $rt;
        }
        return new result(true,'success');
    }

}