<?php
class api_baseControl
{
    protected $request_param;

    public function __construct()
    {
        $params = array_merge($_GET,$_POST);
        $this->request_param = $params;
    }

}