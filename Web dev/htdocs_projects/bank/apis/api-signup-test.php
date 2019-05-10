<?php
/* $sSignupName = $_POST['txtSignupName'] ?? '';//if dont pass anything do nothing; passsing a name="" from signup.php */

//validate if it is empty or if its set
if(empty($_POST['txtName'])){
  echo '{"status":0, "code": '.__LINE__.', "message": "error"}';
  exit;//use exit cos we can use only one echo in the API always
 /*  header('Location: ../signup'); */
}

if($_POST['txtPassword'] != $_POST['txtRetypePassword']){
  echo '{"status":0, "code": '.__LINE__.', "message": "error"}';
  exit;
}

//TODO create a validation PHP file

$jClient = new stdClass();//same as json_decode('{}')
$jClient->id = uniqid();
$jClient->name = $_POST['txtName'];
$jClient->lastName = $_POST['txtLastName'];
$jClient->email = strtolower($_POST['txtEmail']);
$jClient->cpr = $_POST['txtCpr'];
$jClient->password = $_POST['txtPassword'];
$jClient->retypePassword = password_hash($_POST['txtRetypePassword'], 1);
$jClient->transactions = [];//assigning the type of an array
$jClient->signupDate = date("l jS F Y h:i:s A");//day name, day, month, year and time in AM or PM
$jClient->active = 0;
$jClient->activationKey = uniqid().'-'.uniqid();

$sData = file_get_contents('../data/clients.txt');
$aData = json_decode($sData);
//save the user inside the array

array_push($aData, $jClient);
$sData = json_encode($aData);//convert abck to text
file_put_contents('../data/clients.txt', $sData);//throw to the user


echo '{"status":1, "code": '.__LINE__.', "message": "client saved"}';//use __LINE__ for debugging

//TODO save client to file