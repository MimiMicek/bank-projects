<?php require_once 'top.php'; ?>

<h1>LOGIN</h1>

<form id="frmLogin" method="POST">
  <input type="text" name="txtLoginPhone" placeholder="phone">
  <input type="password" name="txtLoginPassword" placeholder="password">
  <button>login</button>
</form>



<?php 
$sLinkToScript = '<script src="js/login.js"></script>';
require_once 'bottom.php'; 
?>