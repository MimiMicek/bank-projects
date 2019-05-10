<?php

if( isset($_POST['txtLoginEmail']) && isset($_POST['txtLoginPassword']) ){

  $sData = file_get_contents('database.txt'); //gettign the data from db
  $jData = json_decode($sData); //turning in into an object
  foreach( $jData->clients as $jClient ){    
    // check if the user name and password exist in the database
    if( $jClient->email == $_POST['txtLoginEmail'] && 
        $jClient->password == $_POST['txtLoginPassword']
    ){
      session_start(); // YOU MUST MUST MUST HAVE THIS TO USE SESSIONS
      // $_SESSION['email'] = $_POST['txtLoginEmail']; // $jClient->email
      // $_SESSION['active'] =  $jClient->active;

      // For security, do not have the pass in the jClient
      // $jClient->password = '';
      unset( $jClient->password );
      $_SESSION['jClient'] = $jClient; //pointing to the whole object
      header('Location: profile.php');
    }
  }

  echo "Sorry try again";
}
?>



  <?php
  // include include_once require require_once
  $sTitle = 'LOGIN';
  $sLinkToCss = '<link rel="stylesheet" href="login.css">';
  require_once 'top.php';
  ?>
  <h1>login</h1>
  <form action="login.php" method="POST"> <!-- if we dont explcitly say its POST it will be GET by a default -->
  <input name="txtLoginEmail" placeholder="email" type="text"
      data-validate="yes" data-type="email" data-min="6" data-max="30">
    <input name="txtLoginPassword" placeholder="password" type="password"
    data-validate="yes"  data-type="string" data-min="3" data-max="20">
    <button>Login</button>
  </form>
  
  <?php
  $sLinkToJs = '<script src="login.js"></script>';
  require_once 'bottom.php';
  ?>