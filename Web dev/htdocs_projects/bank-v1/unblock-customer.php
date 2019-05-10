<?php
//block-customer.php we want to pass an id and we pass it with php?id="1"
//block-customer.php?id=1&name=A%lastName=B means we pass all the variables via URL

if(!isset($_GET['id'])){
  header('Location: view-customers.php');
}

//open the file
$sData = file_get_contents('database.txt');
//convert data to json
$jData = json_decode($sData);
if($jData == null){
  
}

//loop through the customers and find the match in the id
foreach($jData->clients as $jClient){
  if($_GET['id'] == $jClient->id){
    $jClient->active = 1;
    $sData = json_encode($jData);
    file_put_contents('database.txt', $sData);
    header('Location: view-customers.php');
   }
}



