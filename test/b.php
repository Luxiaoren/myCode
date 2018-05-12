<?php
/**
 * Created by PhpStorm.
 * User: luxiaoren
 * Date: 2018/5/10
 * Time: 14:20
 * 测试文件上传的后台
 */
header("Content-type: text/html; charset=utf-8");
if(isset($_FILES['file'])) {
    $file = $_FILES['file'];
    $uploadDir = 'test'.DIRECTORY_SEPARATOR;
    $dir = dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.$uploadDir;


    file_exists($dir) || (mkdir($dir,0777,true) && chmod($dir,0777));
//    if(!is_array($file["name"])) {

    $fileName = iconv('utf-8','gb2312',$file['name']);
    echo $fileName;
    move_uploaded_file($file["tmp_name"], $dir.$fileName);
//    }
}
