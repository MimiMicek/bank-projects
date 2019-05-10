<!-- session key goes fromthe Profile to this page -->
<?php
session_start();

if(!isset($_SESSION['jClient'])){
  header('Location: login.php');
}

$sLoggedUserId = $_SESSION['jClient']->id;

//TODO validate the phone and amount
$sToPhone = $_POST['txtToPhone'];
$iAmount = $_POST['txtAmount'];

//open database
$sData = file_get_contents('database.txt');
$jData = json_decode($sData);//check if the file is corrupted
if($jData == null){
  //TODO send email .....
}

foreach($jData->clients as $jClient){
  if($jClient->id == $sLoggedUserId){
    //echo 'match';
    //$jClient->amount = $jClient->amount - $iAmount;
    $jClient->amount -= $iAmount;
   /*  echo json_encode($jData); */
   //update the session for the amount to update too
   $_SESSION['jClient']->amount = $jClient->amount;
  }

  if($jClient->phone == $sToPhone){
      $jClient->amount += $iAmount;
  }


}
$sData = json_encode($jData);
file_put_contents('database.txt', $sData);
header('Location: profile.php');

echo $sLoggedUserId. ' ' .$sToPhone. ' '. $iAmount;