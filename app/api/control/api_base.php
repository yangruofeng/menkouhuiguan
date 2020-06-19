<?php
class api_baseControl
{
    protected $request_param;

    public function __construct()
    {
        $params = array_merge($_GET,$_POST);
        $this->request_param = $params;
    }

    public function checkToken()
    {
        $token = $this->request_param['token'];
        $rt = (new member_tokenModel())->checkToken($token);
        return $rt;
    }
}