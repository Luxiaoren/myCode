<?php
$json=file_get_contents('data.json');

echo $json;
die();
$data= array();
$data['name']="admin";
$data['sex']="男";
$jsonStr=json_encode($data);
echo $jsonStr.$json;
file_put_contents('data.json',$jsonStr.$json);
