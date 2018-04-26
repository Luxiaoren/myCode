<?php
/**
 * Created by PhpStorm.
 * User: luxiaoren
 * Date: 2018/4/24
 * Time: 19:00
 */
header("content-type:text/html;charset=utf-8");
$host="localhost:3306";
$name="root";
$pass="root";
$link=mysql_connect($host,$name,$pass);
if(!$link){
    echo "connect filed!";
}
mysql_select_db("kangyong");
mysql_query("set names utf8");

$user= $_POST['username'];
$sex=$_POST['sex'];
$comp=$_POST['comp'];
$pen=$_POST['pen'];
$sql="insert myclass (name,sex,comp,pen) values('$user','$sex',$comp,$pen)";
$res=mysql_query($sql);
echo $sql;

if(!$res){
	
	echo "<script>window.location.href='index.html';alert('添加失败');</script>";

	
}else{
	

	echo "<script>alert('添加成功');window.location.href='show.php';</script>";
}
echo $sql;


