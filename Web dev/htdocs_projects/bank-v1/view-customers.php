<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>VIEW CUSTOMERS</title>
  <style>
    .client{
      margin-top: 20px;
    }
    .client:nth-child(even){
      background-color: rgba(0,0,0,.2);
    }


  </style>
</head>
<body>

<h1>VIEW CUSTOMERS</h1>
  
<?php

  $sData = file_get_contents('database.txt');
  // echo $sData;
  $jData = json_decode($sData);
  if( $jData == null ){
    echo 'Error, data is corrupted';
    exit;
  }
    

  foreach( $jData->clients as $jClient ){

    // $sWord = 'BLOCK';
    // if( $jClient->active == 0 ){
    //   $sWord = 'UNBLOCK';
    // }
    // TERNARY
    $sWord = ($jClient->active == 0) ? 'UNBLOCK' : 'BLOCK';

    echo  "<div class='client'>
            <div>id: $jClient->id</div>
            <div>name: $jClient->name</div><a href='block-or-unblock-customer.php?id=$jClient->id'>$sWord</a>
          </div>";
  }

  




?>



</body>
</html>