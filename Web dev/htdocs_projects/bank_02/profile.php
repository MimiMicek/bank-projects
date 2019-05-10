<?php

session_start();
// $_SESSION['sUserId'] = $sPhone; (api-login)

// in new browser, it redirects to login page, if session isn't logged in
if(!isset($_SESSION['sUserId']) ){
    header('Location: login');
}

//the phone number is the id
// get the user id that is stored in the session
$sUserId = $_SESSION['sUserId'];

//open the file to get the keys inside json obj.
$sData = file_get_contents('data/clients.json');
// echo $sData;
//convert to json obj.
$jData = json_decode($sData);
if($jData == null){ echo 'system update'; }

//make a variable jInnerData, which contains the 'data' obj.
$jInnerData = $jData->data;
// echo json_encode($jInnerData);

//make it more readable - put it in a jClient
//make a jclient containing the userId of the data obj.
$jClient = $jInnerData->$sUserId;


require_once 'top.php';
?>

    <h1>PROFILE</h1>

    <div>Phone: <?= $sUserId; ?></div>
    <div>Name: <?= $jClient->name; ?> </div>
    <div>Last Name: <?= $jClient->lastName; ?> </div>
    <div>Email: <?= $jClient->email; ?> </div>
    
    <div>Balance: <span id="lblBalance"><?= $jClient->balance; ?></span></div>


    <h1>Transfer</h1>
    <form id="frmTransfer">
        <input name="txtTransferToPhone" id="txtTransferToPhone" type="text" placeholder="transfer to phone">
        <input name="txtTransferAmount" id="txtTransferAmount" type="text" placeholder="transfer amount">
        <input name="txtTransferMessage" id="txtTransferMessage" type="text" placeholder="transfer message">
        <button>TRANSFER</button>
    </form>

    <h1>Transactions</h1>
    <table>
        <thead>
            <tr>
                <td>ID</td>
                <td>DATE</td>
                <td>AMOUNT</td>
                <td>NAME</td>
                <td>LASTNAME</td>
                <td>PHONE</td>
                <td>MESSAGE</td>
            </tr>
        </thead>

        <tbody id="lblTransactions">

        <?php
        //you already save the innerdata in a jClient
        //get the key (transaction ID) and the value as (one json object transaction)
        
        foreach( $jClient->transactions as $sTransactionId => $jTransaction ){
            echo "
                <tr>
                    <td>$sTransactionId</td>
                    <td>$jTransaction->date</td>
                    <td>$jTransaction->amount</td>
                    <td>$jTransaction->name</td>
                    <td>$jTransaction->lastName</td>
                    <td>$jTransaction->fromPhone</td>
                    <td>$jTransaction->message</td>
                </tr>
            ";
        }

      ?>


        </tbody>

    </table>



<?php 
    $sLinkToScript = '<script src="js/profile.js"></script>';
    require_once "bottom.php";
?>




