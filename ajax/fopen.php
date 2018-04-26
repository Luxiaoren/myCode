<?php

$str=file_get_contents('data.json');

$data=json_decode($str,true);
// var_dump($data[0]);
// var_dump($data["student"][0]["name"]);
// echo count($data["student"]);
$len=count($data["student"]);
$data["student"][$len]['name']="ppp";
$data["student"][$len]['sex']="oo";
 echo count($data["student"]);

 $jsonStr=json_encode($data);
 file_put_contents('data.json',$jsonStr);


 function getJson(){
     
 }
