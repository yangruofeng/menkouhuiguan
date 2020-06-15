<?php

class userBase
{
    public $property = array();
    private $roleList;
    private $authList;
    private $authMap;
    protected $groupList;
    public $cache = array();//缓存数据
    static $current_user;

    public static function Current($key='')
    {
        if (self::$current_user instanceof userBase) {
            return self::$current_user;
        } else {
            $user_info = operator::getUserInfo_old($key);
            if (!$user_info) return null;
            self::$current_user = new userBase($user_info);
            return self::$current_user;
        }
    }

    public function __construct($uid, $app_code = null)
    {
        if (is_numeric($uid)) {
            $orm = M("um_user");
            $this->property = $orm->getRow($uid);
        } else {
            if ($uid instanceof ormDataRow) {
                $this->property = $uid;
            } else {
                if (is_array($uid)) {
                    $this->property = new ormDataRow($uid);
                }
            }
        }
        if (!count($this->property)) {
            throw new Exception("Invalid User Information");
        }
    }

    public function getRoleList()
    {
        if ($this->roleList) return $this->roleList;
        $rt = userClass::getUserRoleList($this->property->uid, $this->property->user_position);
        return $rt;
    }

    public function getGroupList()
    {
        if($this->groupList) return $this->groupList;
        $list = userClass::getUserGroutList($this->property->uid);
        $this->groupList = $list;
        return $list;
    }

    public function getAuthList()
    {
        if (is_array($this->authList)) return $this->authList;
        // 获取角色的权限
        $role_list = $this->getRoleList();
        $auth_role=array();

        foreach ($role_list as $role) {
            $auth_role= array_merge($auth_role, $role['auth_list']['allow_auth']);
        }

        // 去除限制以后的角色权限
        $auth_role = array_unique($auth_role);

        //去掉用户受限制的
        $arr_limit = $this->getUserLimitAuthList();
        $auth_role = array_diff($auth_role, $arr_limit);

        //增加用户特殊允许的
        $arr_allow = $this->getUserAllowAuthList();
        $auth_list = array_merge(array(), $auth_role, $arr_allow);

        // 去重
        $auth_list = array_unique($auth_list);

        $this->authList=$auth_list;

        return $this->authList;
    }

    public function getAuthMap(){
        $this->getAuthList();
        return $this->authMap;
    }
    public function checkAuth($auth_code, $type)
    {
        $arr = $this->getAuthList();
        return in_array($auth_code, $arr[$type]);
    }

    public function checkRole($role_code)
    {
        $arr = $this->getRoleList();
        return in_array($role_code, $arr);
    }

    public function getUserLimitAuthList()
    {
        $m = M("um_special_auth");
        $arr = $m->select(array('user_id' => $this->property->uid, 'special_type' => 2));
        $arr = array_column($arr, 'auth_code');
        return $arr ?: array();
    }

    public function getUserAllowAuthList()
    {
        $m = M("um_special_auth");
        $arr = $m->select(array('user_id' => $this->property->uid, 'special_type' => 1));
        $arr = array_column($arr, 'auth_code');
        return $arr ?: array();
    }

    //获取用户基本信息
    public static function getPropertyByUserId($user_id)
    {
        $m = M("um_user");
        return $m->find(array("uid" => $user_id));
    }

}

class authBase
{
    public static function getAuthGroup($_role_code, $auth_type = 'back_office')
    {

        $auth_group_list = self::getAllAuthGroup();
        $auth_group = $auth_group_list[$auth_type];
        if (in_array($_role_code, $auth_group)) {
            if ($auth_type != authTypeEnum::BACK_OFFICE) {
                $_role_code = $auth_type . '_' . $_role_code;
            }
            //$cls_name = "authGroup_" . $_role_code;
            $role = new authGroupBase($_role_code,$auth_type);
            $role->Code = $_role_code;
            return $role;
        } else {
            return 0;
        }
    }

    public static function getAllAuthGroup()
    {
        $sql="select * from um_menu_group";
        $rows=(new ormReader())->getRows($sql);
        $group=resetArrayKey($rows,"group_code");
        return $group;
    }
    public static function getAllAuthKeyListByGroup(){
        $sql="select * from um_auth where is_removed=0";
        $rows=(new ormReader())->getRows($sql);
        $ret=array();
        foreach($rows as $item){
            $ret[$item['entry_key']][$item['group_key']][]=$item['uid'];
        }
        return $ret;
//        return array('auth_group_back_office' => $ret[authTypeEnum::BACK_OFFICE], 'auth_group_counter' => $ret[authTypeEnum::COUNTER]);
    }
    public static function getAllAuthItemListByGroup($root){
        //$sql="select * from um_auth where is_removed=0";
        $sql="SELECT IFNULL(gp.top_code,SUBSTR(node.node_code,1,2)) top_code,gp.group_name,gp.icon_key,node.*
FROM um_menu_node node LEFT JOIN um_menu_group gp ON node.`group_code`=gp.`group_code` ";
        if($root){
            $sql.=" WHERE node.`is_canceled`=0 ";
        }else{
            $sql.=" WHERE node.`is_canceled`=0 AND node.`is_closed`=0 ";
        }

        $sql.=" ORDER BY node.`node_code`";

        $rows=(new ormReader())->getRows($sql);


        /*$ret=array();
        foreach($rows as $item){
            $ret[$item['entry_key']][$item['group_key']][$item['uid']]=$item['auth_title'];
        }
        */
        return $rows;
//        return array('auth_group_back_office' => $ret[authTypeEnum::BACK_OFFICE], 'auth_group_counter' => $ret[authTypeEnum::COUNTER]);
    }
    public static function getAllAuthList($filter_uid){
        if(is_array($filter_uid)){
            if(!count($filter_uid)) return array();
        }
        $sql="select * from um_auth where is_removed=0";
        $rows=(new ormReader())->getRows($sql);
        $rows=resetArrayKey($rows,"uid");
        if(count($filter_uid)){
            $ret=array();
            foreach($filter_uid as $uid){
                $ret[$uid]=$rows[$uid];
            }
            $rows=$ret;
        }
        $rows=resetArrayKey($rows,"auth_key");
        return $rows;
    }
}

