<?php
header("content-type:text/html;charset=utf-8");

$flag = $_POST['flag'];

if ($flag === "index") {
    index();
}
if ($flag === "search") {
    search();
}

function search()
{
    $name = $_POST['name'];
    switch ($name) {
        case "癌症":
            $name = "cancer";
            break;
        case "糖尿病":
            $name = "diabetes";
            break;
        case "哮喘病":
            $name = "asthma";
            break;
        default:
            $name = "";
    }
    if ($name === "") {
        echo "";
        die();
    }
    $res = file_get_contents("date.json");
    $arr = json_decode($res, true);
    foreach ($arr as $key => $val) {
        if ($key === $name) {
            echo json_encode($arr[$key]);
            break;
        }
        // print_r($key);
    }
}

// index();
function index()
{
    $res = file_get_contents("date.json");
    $arr = json_decode($res, true);
    $arrs = array();
    foreach ($arr as $key => $val) {
        $arrs[] = $arr[$key];
        // print_r($key);
    }

    // print_r($arrs);
    echo json_encode($arrs);

    // $disName=$_POST['disname'];
    // $disName="cancer";
    // for($i=0;$i<count($arr);$i++){
    //     if($arr[$disName]){
    //         var_dump($arr[$disName]);

    //     }
    // }
    // $disName="cancer";
    // for($i=0;$i<count($arr);$i++){
    //   var_dump($arr[$i]);

    // }
}

