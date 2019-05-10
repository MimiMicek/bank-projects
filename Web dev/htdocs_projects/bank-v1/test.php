<?php

/*$sName = 'ABCycsdasd';
 echo $sName; 

echo strlen($sName);*/

//put the content of the file in the variable
$sData = file_get_contents('database.txt');

echo $sData;

//convert the text into an object
$jData= json_decode($sData);

echo '<div>'.$jData->name.'</div>'; //points to the name in the text file
echo '<div>'.$jData->address.'</div>';
echo '<h1>CLIENTS</h1>';

foreach($jData->clients as $jClient){
  echo "<div>id: $jClient->id</div>";
  echo "<div>name: $jClient->name</div>";
  echo "<div>lastName: $jClient->lastName</div>";
}

$sNewClient = '{}';
$jNewClient = json_decode($sNewClient);
$jNewClient->id = uniqid(); //giving generated ids
$jNewClient->name = "AAA"; 
$jNewClient->lastName = "KKK";

//put the new client inside the array of clients
array_push($jData->clients, $jNewClient);//happening in RAM
//saving an JSON object back to the file
$sFinalData = json_encode($jData);
//save it
file_put_contents('database.txt', $sFinalData);

echo json_encode($jNewClient); //object to text