<?php
/**
 * Created by PhpStorm.
 * User: sahara
 * Date: 2019/4/11
 * Time: 14:01
 */

// 子项目特殊的方法文件

// 引用公用目录下的模板文件
function common_template($tplpath)
{
    return _APP_COMMON_ . DS . 'widget' . DS  . $tplpath . '.php';
}


function getAliyunOssFileUrl($path)
{
    if( !$path ){
        return null;
    }
    if( strpos($path,'http') !== false ){
        return $path;
    }else{
        return ALIYUN_OSS_URL.DS.$path;
    }
}

function formatPageResult(ormPageResult $page_data)
{
    return array(
        "sts" => true,
        "list" => $page_data->rows,
        "total" => $page_data->count,
        "pageTotal" => $page_data->pageCount,
        "pageNumber" => $page_data->pageIndex,
        "pageSize" => $page_data->pageSize,
    );
}
