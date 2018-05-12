<?php
/**
 * Created by PhpStorm.
 * User: luxiaoren
 * Date: 2018/5/10
 * Time: 15:08
 */
header("Content-type: text/html; charset=utf-8");
$host = "localhost";
$name = "root";
$pass = "root";
//$host = "qdm126047110.my3w.com";
//$name = "qdm126047110";
//$pass = "Luxiaoren0";
$mysql = mysql_connect($host, $name, $pass);
mysql_select_db("basefile");
//mysql_select_db("qdm126047110_db");
mysql_query("set names utf8");
if(isset($_FILES['file'])) {
    $file = $_FILES['file'];
    $uploadDir = 'file'.DIRECTORY_SEPARATOR;
    $dir = dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.$uploadDir;


    file_exists($dir) || (mkdir($dir,0777,true) && chmod($dir,0777));
//    if(!is_array($file["name"])) {
    $fileName =$file['name'];
    $filein = iconv('utf-8','gb2312',$fileName );
    $fileout = iconv('utf-8','utf-8',$fileName);
    move_uploaded_file($file["tmp_name"], $dir.$filein);
    echo    $fileName;
//    }
}