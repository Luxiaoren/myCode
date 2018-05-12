<?php
header("Content-type:text/html;charset=utf-8");
$str=file_get_contents('test.json');
$arr=json_decode($str,true);
var_dump($arr["学生"]);
$a="汉子";
if(@array_key_exists( $a,$arr["学生"][0])){
    $arr["学生"][0][$a]="sfdsdsdsdaf";
}else{
    $arr["学生"][0][$a]="sfadfasda";
    array_shift($arr["学生"][0]);

}
$arr=json_encode($arr);
file_put_contents('test.json',$arr);


//var_dump($arr["学生"]);


//
//
//$arr = array('name'=>1111,'pass'=>222222);
//$key = 'name1';
//
//
//
//if(array_key_exists($key, $arr))echo $arr[$key];
//else{
//    echo 1;
//};
?>