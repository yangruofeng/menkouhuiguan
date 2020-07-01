<?php
class memberControl extends api_baseControl
{

    public function updateInfoOp()
    {
        $rt = $this->checkToken();
        if( !$rt->STS ){
            return $rt;
        }
        debug($this->request_param);
        $member_info = $rt->DATA;
        $member_id = $member_info['uid'];
        return memberClass::updateMemberUserInfo($member_id,$this->request_param);
    }

}