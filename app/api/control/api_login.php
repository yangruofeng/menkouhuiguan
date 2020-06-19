<?php
class api_loginControl extends api_baseControl
{
    public function loginOp()
    {
        return memberClass::loginByWechat($this->request_param);
    }

    public function checkTokenOp()
    {
        $token = $this->request_param['token'];
        $m = new member_tokenModel();
        $rt = $m->checkToken($token);
        return $rt;
    }
}