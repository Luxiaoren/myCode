<?php

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
$id=$_GET['id'];
$sql="delete from myclass where id=$id";
$res=mysql_query($sql);
if(!res){

}else{
	echo "<script>window.location.href='show.php';alert('删除成功')</script>";
}
?>