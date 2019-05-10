<?php

$sSignupPass = 'A1';
$sLoginPass = 'A1';

$sHashedSignupPass = password_hash($sSignupPass, 1);

$bSuccess = password_verify($sLoginPass, $sHashedSignupPass);
//not neccessary to hash the $sLoginPass because it unhashes the second
//variable and then compares to the first

if($bSuccess){
  echo 'Login success';
}else{
  echo 'Error';
}

//have the pass and retype pass
//the server in the API checks if the password matches the passs if it 
//matches we hash the pass if not we send the error message back to the browser