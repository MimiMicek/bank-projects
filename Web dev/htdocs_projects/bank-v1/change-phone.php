<!-- session key goes fromthe Profile to this page -->
<?php
session_start();

if(!isset($_SESSION['jClient'])){
  header('Location: login.php');
}

$sLoggedUserId = $_SESSION['jClient']->id;

//validate the phone
$changePhone = $_POST['changePhone'];

//open database
$sData = file_get_contents('database.txt');
$jData = json_decode($sData);//check if the file is corrupted
if($jData == null){
  //TODO send email .....
}

foreach($jData->clients as $jClient){
  if($jClient->id == $sLoggedUserId){
      $jClient->phone = $changePhone;
      //update the session for the amount to update too
      $_SESSION['jClient']->phone = $changePhone;
  }
}
$sData = json_encode($jData);
file_put_contents('database.txt', $sData);
header('Location: profile.php');

echo $sLoggedUserId. ' ' .$sToPhone. ' '. $iAmount;