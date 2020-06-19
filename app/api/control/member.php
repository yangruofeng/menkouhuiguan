<?php
class memberControl extends api_baseControl
{

    public function updateInfo()
    {
        $rt = $this->checkToken();
        if( !$rt->STS ){
            return $rt;
        }
        debug($this->request_param);
        $member_info = $rt->DATA;
        $user_info = $this->request_param['user_info'];
        return new result(true,'success');
    }

}