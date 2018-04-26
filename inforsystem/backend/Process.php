<?php



$page=$_POST['page'];


switch($page){
    case "index":index();break;
    case "main":main();break;
    case "stubasefile":stubasefile();break;
}
function stubasefile(){
    $str=file_get_contents('data.json');
    $arr=json_decode($str,true);
    $username=$_POST['username'];

    $len=count($arr["basefile"]);
    for($i=0;$i<$len;$i++){
        if($arr["basefile"][$i]["username"]==$username){
            echo json_encode($arr["basefile"][$i]);
            die();
        }
    }

}
function main(){
    $str=file_get_contents('data.json');
    $arr=json_decode($str,true);
    $username=$_POST['username'];
    $counttype=$_POST['counttype'];
    $len=count($arr["basefile"]);
    for($i=0;$i<$len;$i++){
        if($arr["basefile"][$i]["username"]==$username){
            echo json_encode($arr["basefile"][$i]);
            die();
        }
    }

}
function index(){
$str=file_get_contents('data.json');
$arr=json_decode($str,true);
$username=$_POST['user'];
$password=$_POST['pass'];

$length=count($arr["logcount"]);
$flag=false;
for($i=0;$i<$length;$i++){
    if(($username==$arr["logcount"][$i]["username"])&&($password==$arr["logcount"][$i]["password"])){
       echo json_encode($arr["logcount"][$i]);
        $flag=true;
        break;
    }
}
if(!$flag){
    echo "false";
}
}
