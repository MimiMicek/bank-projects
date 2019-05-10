<?php 

//validate phone
$sPhone = $_POST['txtSignupPhone'] ?? '';
if( empty($sPhone) ){ sendResponse(0, __LINE__); }
if( strlen($sPhone) != 8 ){ sendResponse(0, __LINE__); }
if( intval($sPhone) < 10000000 ){ sendResponse(0, __LINE__); }
if( intval($sPhone) > 99999999 ){ sendResponse(0, __LINE__); }

// validate name
$sName = $_POST['txtSignupName'] ?? '';
if( empty($sName) ){ sendResponse(0, __LINE__);  }
if( strlen($sName) < 2 ){ sendResponse(0, __LINE__); }
if( strlen($sName) > 20 ){ sendResponse(0, __LINE__); }

// validate last name
$sLastName = $_POST['txtSignupLastName'] ?? '';
if( empty($sLastName) ){ sendResponse(0, __LINE__);  }
if( strlen($sLastName) < 2 ){ sendResponse(0, __LINE__); }
if( strlen($sLastName) > 20 ){ sendResponse(0, __LINE__); }

// validate email
$sEmail = $_POST['txtSignupEmail'] ?? '';
if( empty($sEmail) ){ sendResponse(0, __LINE__);  }
if( !filter_var( $sEmail, FILTER_VALIDATE_EMAIL ) ){ sendResponse(0, __LINE__);  }

// validate password
$sPassword = $_POST['txtSignupPassword'] ?? '';
if( empty($sPassword) ){ sendResponse(0, __LINE__);  }
if( strlen($sPassword) < 4 ){ sendResponse(0, __LINE__); }
if( strlen($sPassword) > 50 ){ sendResponse(0, __LINE__); }

// validate confirm password
$sConfirmPassword = $_POST['txtSignupConfirmPassword'] ?? '';
if( empty($sConfirmPassword) ){ sendResponse(0, __LINE__);  }
if( $sPassword != $sConfirmPassword ){ sendResponse(0, __LINE__);  }

// validate CPR
$sCpr = $_POST['txtSignupCpr'] ?? '';
if( empty($sCpr) ){ sendResponse(0, __LINE__);  }
if( strlen($sCpr) != 10 ){ sendResponse(0, __LINE__); }
if( !ctype_digit($sCpr)  ){ sendResponse(0, __LINE__);  }

//when all is validated, open the file and check it for corruption
$sData = file_get_contents('../data/clients.json');
$jData = json_decode($sData);
if( $jData == null ){ sendResponse(0, __LINE__); }

$jInnerData = $jData->data; //from the data obj. - point to the obj. inside = the id/phone


$jClient = new stdClass(); // json empty obj.
$jClient->name = $sName;
$jClient->lastName = $sLastName;
$jClient->email = $sEmail;
$jClient->password = password_hash( $sPassword, PASSWORD_DEFAULT );
$jClient->cpr = $sCpr;
$jClient->balance = 0;


// make this structure in the file
// "accounts": {
//   "5c62d64541460": {
//       "balance": 0
//   }
$jClient->accounts = new stdClass(); // make json obj. {}
$jAccount = new stdClass(); // make json obj. inside accounts
$jAccount->balance = 0; // put balance in jAccount
$sAccountId = uniqid(); // set an uniqid to a varible
$jClient->accounts->$sAccountId = $jAccount; // inside accounts and ID - i want to put the new obj. jAccount, which contains the balance
// $sAccountId = uniqid();
// $jClient->accounts->$sAccountId = new stdClass();

//make json obj., so it can contain more than one
$jClient->transactions = new stdClass();
$jClient->transactionsNotRead = new stdClass();


$jInnerData->$sPhone = $jClient; // put the jClient ID/phone inside the jInnerData

//convert the obj. back to text and check the file 
$sData = json_encode( $jData );
if( $sData == null   ){ sendResponse(0, __LINE__); }
//put it back in the file
file_put_contents( '../data/clients.json', $sData );


// SUCCESS
sendResponse(1, __LINE__);


// **************************************************
// func that sends a response 0 or 1, if there is an error or success
// used more than 2 times, therefore make a function
function sendResponse( $bStatus, $iLineNumber ){
  echo '{"status":'.$bStatus.', "code":'.$iLineNumber.'}';
  exit;
}
