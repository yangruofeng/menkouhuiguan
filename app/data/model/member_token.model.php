<?php
class member_tokenModel extends tableModelBase
{
    public function __construct()
    {
        parent::__construct('member_token');
    }

    public function insertToken($member_id)
    {
        $token = md5($member_id.time().uniqid());
        $row = $this->newRow();
        $row->member_id = $member_id;
        $row->token = $token;
        $row->create_time = Now();
        $rt = $row->insert();
        if( !$rt->STS ){
            return $rt;
        }
        return new result(true,'success',$token);
    }

    public function checkToken($token)
    {
        $data = $this->find(array(
            'token' => $token
        ));
        if( !$data ){
            return new result(false,'Token无效');
        }
        $member_info = (new memberModel())->find($data['member_id']);
        return new result(true,'success',$member_info);
    }

}