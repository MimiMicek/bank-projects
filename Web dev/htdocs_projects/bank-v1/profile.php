<?php

  session_start(); // MUST MUST MUST
  if( !isset($_SESSION['jClient']) ){//checks if a session has a jClient object
    header('Location: login.php');
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?= $_SESSION['jClient']->email; ?></title>
  <style>
    .error{
      color: red;
    }
  </style>
</head>
<body>
  
  <h1>profile</h1>
    <h1>Amount available: <?php echo $_SESSION['jClient']->amount;  ?></h1>
  
  <form action="transfer-money.php" method="POST">
    <input name="txtToPhone" type="text" placeholder="to phone"><!-- needs to have name to pass data -->
    <input name="txtAmount" type="text" placeholder="amount">
    <button>Transfer now</button>
  </form>
  <br>
  <h2>Hello,  <?php echo $_SESSION['jClient']->email;  ?></h2><!-- gets an email from a global variable -->

  <h3>Phone: <?= $_SESSION['jClient']->phone; ?> </h3>
  <form action="change-phone.php" method="POST">
    <input name="changePhone" type="text" placeholder="Change phone">
    <button>Change phone</button>
  </form>
  <!-- <h3>Password: <?= $_SESSION['jClient']->password; ?> </h3> -->

  <?php echo json_encode( $_SESSION['jClient'] );  ?>

  <?php echo json_encode($_SESSION); ?>
  <?php 
    if($_SESSION['jClient']->active == false){
      echo '<div class="error">CONTACT BANK... BLOCKED</div>';
    }
  ?>
  <br>
  <br>
  <a type="button" href="logout.php">logout</a>


</body>
</html>