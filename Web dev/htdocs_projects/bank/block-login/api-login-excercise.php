<?php

//User tries to login the first time incorrectly
//after the 3rd time you are blocked for a minute
//The user is blocked for 1 min, wait for 60 secs and try to login again
//wait 50 seconds to try and login again
//wait 10 secs and try to login again
//if the password or email dont match with the ones in the database block the user

$sPhone = $_POST['phone'];
$sPassword = $_POST['password'];

$sUser = file_get_contents("$sPhone.json");
$jUser = json_decode($sUser);

if($jUser->iLoginAttemptsLeft == 0){
   $iSecondsElapsedSinceLastLoginAttempt = $jUser->iLastLoginAttempt + 5 - time();
    if($iSecondsElapsedSinceLastLoginAttempt <= 0){
      if($jUser->sPassword != $sPassword){
        echo "Wrong credentials. You have to wait again!";
        exit;//exit creates an implicit else so w edo not need to write it
      }
        $jUser->iLoginAttemptsLeft = 3;
        $jUser->iLastLoginAttempt = 0;
        file_put_contents("$sPhone.json", json_encode($jUser, JSON_PRETTY_PRINT));
        echo 'You are logged in';
        exit;
      }
    echo "wait $iSecondsElapsedSinceLastLoginAttempt seconds to log in again";
    exit;
    }
  



  if($jUser->sPassword != $sPassword){
    $jUser->iLoginAttemptsLeft --;
    $jUser->iLastLoginAttempt = time();
    file_put_contents("$sPhone.json", json_encode($jUser, JSON_PRETTY_PRINT));
    echo "Wrong credentials. You have {$jUser->iLoginAttemptsLeft} attempts left";
    exit;
  }




//save it back to the file

