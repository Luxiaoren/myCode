<?php


$page = $_POST['page'];



switch ($page) {
    case "index":
        index();
        break;
    case "main":
        main();
        break;
    case "stubasefile":
        stubasefile();
        break;
    case "stuclassdate":
        stuclassdate();
        break;
    case "stuhomework":
        stuhomework();
        break;
    case "stuclassconf":
        stuclassconf();
        break;
    case "tecbasefile":
        tecbasefile();
        break;
    case "savetec":
        savetec();
        break;
    case "saveleader":
        saveleader();
        break;
    case "addtip":
        addtip();
        break;
    case "addhom":
        addhom();
        break;
    case "getadmin":
        getadmin();
        break;

}
/**
 *
 */
function getadmin(){
    $str = file_get_contents('data.json');
    $arr = json_decode($str, true);
    echo json_encode($arr["logcount"]);
}


function addhom(){
    $homtit=$_POST['homTitle'];
    $homcon=$_POST['homCon'];
    $homtec=$_POST['homTech'];
    $homlec=$_POST['homLec'];
    $time=$_POST['time'];
    $str = file_get_contents('data.json');
    $arr = json_decode($str, true);
    $le=count($arr["homework"]);
    $arr["homework"][$le]["title"]=$homtit;
    $arr["homework"][$le]["teacher"]=$homtec;
    $arr["homework"][$le]["class"]=$homlec;
    $arr["homework"][$le]["time"]=$time;
    $arr["homework"][$le]["intro"]=$homcon;
    $arr=json_encode($arr);
    file_put_contents('data.json',$arr);

//    echo $homtit.$homcon.$homtec.$homlec.$time;
}
function addtip(){
    $tiptit=$_POST['tipTitle'];
    $tipCon=$_POST['tipCon'];
    $time=$_POST['time'];
    $str = file_get_contents('data.json');
    $arr = json_decode($str, true);

    $le=count($arr["classconf"]);
    $arr["classconf"][$le]["title"]=$tiptit;
    $arr["classconf"][$le]["time"]=$time;
    $arr["classconf"][$le]["content"]=$tipCon;

    $arr=json_encode($arr);
    file_put_contents('data.json',$arr);





//    echo $time.$tiptit.$tipCon;
}
function saveleader(){


echo "saveleader";


//    $str=file_get_contents('classinfo.json');
//    $arr=json_decode($str,true);
//    $index=$_POST['index'];
//    $key=$_POST['key'];
//    $value=$_POST['value'];
//    $classname=$_POST['classname'];
//    $arr[$classname]["班委信息"][$index];
//    if(@array_key_exists($key,$arr[$classname]["班委信息"][$index])){
//        $arr[$classname]["班委信息"][$index][$key]=$value;
//    }else{
//        $arr[$classname]["班委信息"][$index][$key]=$value;
//        array_shift($arr[$classname]["班委信息"][$index]);
//    }
//
//    file_put_contents('classinfo.json',json_encode($arr));
//    $str=file_get_contents('classinfo.json');
//    $arr=json_decode($str,true);
//    echo json_encode($arr);
////    echo "yes";
}
function savetec(){



//$str=file_get_contents('classinfo.json');
//$arr=json_decode($str,true);
//$index=$_POST['index'];
//$key=$_POST['key'];
//$value=$_POST['value'];
//$classname=$_POST['classname'];
//$arr[$classname]["教师信息"][$index];
//if(@array_key_exists($key,$arr[$classname]["教师信息"][$index])){
//   $arr[$classname]["教师信息"][$index][$key]=$value;
//}else{
//   $arr[$classname]["教师信息"][$index][$key]=$value;
//    array_shift($arr[$classname]["教师信息"][$index]);
//}
//
//    file_put_contents('classinfo.json',json_encode($arr));
//    $str=file_get_contents('classinfo.json');
//    $arr=json_decode($str,true);
////echo json_encode($arr);
}
function tecbasefile(){
    $str = file_get_contents('data.json');
    $arr = json_decode($str, true);
    $username = $_POST['username'];
    $len = count($arr["basefile"]);
    for ($i = 0; $i < $len; $i++) {
        if ($arr["basefile"][$i]["username"] == $username) {
            echo json_encode($arr["basefile"][$i]);
            die();
        }
    }
//    echo json_encode("")
}
function stuclassconf()
{
    $str = file_get_contents('data.json');
    $arr = json_decode($str, true);

    echo json_encode($arr["classconf"]);
}

function stuhomework()
{
    $str = file_get_contents('data.json');
    $arr = json_decode($str, true);

    echo json_encode($arr["homework"]);
}

function stuclassdate()
{

    $str = file_get_contents('data.json');
    $arr = json_decode($str, true);

    echo json_encode($arr["classmate"]);
//    echo "****";

}

function stubasefile()
{
    $str = file_get_contents('data.json');
    $arr = json_decode($str, true);

    $username = $_POST['username'];
    $len = count($arr["basefile"]);
    for ($i = 0; $i < $len; $i++) {
        if ($arr["basefile"][$i]["username"] == $username) {
            echo json_encode($arr["basefile"][$i]);
            die();
        }
    }

}

function main()
{
    $str = file_get_contents('data.json');
    $arr = json_decode($str, true);
    $username = $_POST['username'];
    $counttype = $_POST['counttype'];
    $len = count($arr["basefile"]);
    for ($i = 0; $i < $len; $i++) {
        if ($arr["basefile"][$i]["username"] == $username) {
            echo json_encode($arr["basefile"][$i]);
            die();
        }
    }

}

function index()
{
    $str = file_get_contents('data.json');
    $arr = json_decode($str, true);
    $username = $_POST['user'];
    $password = $_POST['pass'];

    $length = count($arr["logcount"]);
    $flag = false;
    for ($i = 0; $i < $length; $i++) {
        if (($username == $arr["logcount"][$i]["username"]) && ($password == $arr["logcount"][$i]["password"])) {
            echo json_encode($arr["logcount"][$i]);
            $flag = true;
            break;
        }
    }
    if (!$flag) {
        echo "false";
    }
}
