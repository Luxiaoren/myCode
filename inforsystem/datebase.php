<?php
/**
 * Created by PhpStorm.
 * User: luxiaoren
 * Date: 2018/5/8
 * Time: 10:34
 */

$host = "localhost";
$name = "root";
$pass = "root";
$mysql = mysql_connect($host, $name, $pass);
mysql_select_db("basefile");
//mysql_select_db("qdm126047110_db");
mysql_query("set names utf8");


$page = $_REQUEST['page'];
switch ($page) {
    case "save":
        save();
        break;
    case "getclass":
        getclass();
        break;
    case "saveadd":
        saveadd();
        break;
    case "tecGetClass":
        tecGetClass();
        break;
    case "addpeople":
        addpeople();
        break;
    case "delinfo":
        delinfo();
        break;
    case "updInfo":
        updInfo();
        break;
}
function updInfo(){
    $updid=$_POST['updId'];
    $updarr=$_POST['updStr'];
    $updarr=split("&",$updarr);
    $sql="update peoinfo set 学号='$updarr[0]',姓名='$updarr[1]',性别='$updarr[2]',民族='$updarr[3]',身份证号='$updarr[4]',家庭住址='$updarr[5]',联系方式='$updarr[6]',邮箱='$updarr[7]' where id=$updid";
    $res=mysql_query($sql);
    if(!$res){
        echo "更新信息失败";
        die();
    }

    echo "更新成功";
//    echo $updArr;
}
function delinfo(){
    $delid=$_POST['delId'];
    $sql="delete from peoinfo where id=$delid";
    $res=mysql_query($sql);
    if(!$res){
        echo "删除 id为".$delid."的操作失败";
        die();
    }
    echo "删除id为".$delid."的操作成功";
}
function addpeople(){
    $arr=$_POST['arr'];
    $arr=split("&",$arr);
    $classid=$_POST['classid'];
    $sql="INSERT INTO peoinfo (classid, 学号, 姓名, 性别, 民族, 身份证号, 家庭住址, 联系方式, 邮箱) VALUES ( '$classid', '$arr[0]', '$arr[1]', '$arr[2]', '$arr[3]', '$arr[4]', '$arr[5]', '$arr[6]', '$arr[7]')";
    $res=mysql_query($sql);
    if(!$res){
        echo "添加班级同学信息失败";
        die();
    }
    echo "添加班级同学信息成功";
}
function tecGetClass(){
    $user=$_POST['user'];
//    echo $user;

    $sql="select * from baseinfo where 教师='$user'";
    $res=mysql_query($sql);
    $arr=array();
    while($row=mysql_fetch_assoc($res)){
        $arr[0][]=$row;
    }
//
//    echo $arr[0][0]['id'];
    for($i=0;$i<count($arr[0]);$i++){
        $id=$arr[0][$i]['id'];
        $sql="select * from  peoinfo where classid= $id";
        $res=mysql_query($sql);
        if(!$res){
            echo mysql_error();
            die();
        }
        while(@$row=mysql_fetch_assoc($res)){
            $arr[1][]=$row;
        }
    }
    echo json_encode($arr);
}
function saveadd()
{

    $className = $_POST['className'];
    $major = $_POST['major'];
    $depar = $_POST['depar'];
    $peoNum = $_POST['peoNum'];
    $teachStr = $_POST['teachStr'];
    $teachnum = $_POST['teachnum'];
    $leaderStr = $_POST['leaderStr'];
    $leadernum = $_POST['leadernum'];
    $user = $_POST['user'];
    $sql = "select count(*) from baseinfo";
    $res = mysql_query($sql);
    $arr = mysql_fetch_array($res);
    $id = $arr[0] + 1;

    $sql = "insert into baseinfo value($id,'$className','$major','$depar',$peoNum,'$user')";
    $res = mysql_query($sql);
    if (!$res) {
        echo $sql;
        die();
    }
    $teachArr = split("&", $teachStr);
    $leaderArr = split("&", $leaderStr);

    for ($i = 0; $i < $teachnum * 2; $i += 2) {
        $j = $i + 1;
        $sql = "insert into people value($id*100+($i/2+1),$id,'$teachArr[$i]','$teachArr[$j]','教师信息')";
        $res = mysql_query($sql);
        if (!$res) {
            echo "添加教师信息信息失败";
            die();
        }
    }
    for ($i = 0; $i < $leadernum * 2; $i += 2) {
        $j = $i + 1;
        $sql = "insert into people value($id*100+($i/2+1)+$teachnum,$id,'$leaderArr[$i]','$leaderArr[$j]','班委信息')";
        $res = mysql_query($sql);
        if (!$res) {
            echo "添加班委信息失败";
            die();
        }
    }


    echo "添加成功";


    echo $teachStr;
}

function getclass()
{
    $user = $_POST['user'];
    $sql = "select * from baseinfo where 教师='$user'";
    $res = mysql_query($sql);
    while ($row = mysql_fetch_assoc($res)) {
        $arr[0][] = $row;
    }


//    echo json_encode($arr);

    $sql = "select * from people";
    $res = mysql_query($sql);
    while ($row = mysql_fetch_assoc($res)) {
        $arr[1][] = $row;
    }
    echo json_encode($arr);
}

function save()
{

    $classname = $_POST['classname'];

    $update = $_POST['update'];
    $arrAll = split("&", $update);
    echo count($arrAll);

    $teachnum = $_POST['teachnum'];
    $leadernum = $_POST['leadernum'];
//    echo $teachnum.$leadernum;
////for($i=0;i<count)
//echo count($arr);
    $sql = "select id from baseinfo where 班级名称='$classname'";
    $res = mysql_query($sql);
    $arrs = mysql_fetch_assoc($res);
    $id = $arrs["id"];

    for ($i = 0; $i < $teachnum * 2 + $leadernum * 2; $i += 2) {
        if ($i < $teachnum * 2) {

            $infotype = "教师信息";
        } else {
            $infotype = "班委信息";
        }

        $sql = "select *from people where id=$id*100+($i/2+1)";
        $res = mysql_query($sql);
        $arr = mysql_fetch_assoc($res);
        $name = $arrAll[$i];
        $job = $arrAll[$i + 1];

        if ($arr) {
            $sql = "update people set name='$name',job='$job' where id=$id*100+($i/2+1)";
            $res = mysql_query($sql);
            if (!$res) {
                echo "更新数据失败";
            }

        } else {
            $sql = "insert into people(id,classid,name,job,infotype)value(($id*100+$i/2+1),$id,'$name','$job','$infotype')";
            $res = mysql_query($sql);
            if (!$res) {
                echo "插入失败";
            }
        }
    }


//    echo $arr[1];
}

