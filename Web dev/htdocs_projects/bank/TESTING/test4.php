<?php

$sData = file_get_contents('clients.json');
$jData = json_decode($sData);

if($jData == null){
  echo 'check the database';
}

$jData = $jData->data;

foreach($jData as $sKey => $jClient){
  echo $sKey.json_encode($jClient);//show the ID keys with json objects
}