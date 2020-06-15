<?php
class api_loginControl extends api_baseControl
{
    public function loginOp()
    {
        return memberClass::login($this->request_param);
    }
}