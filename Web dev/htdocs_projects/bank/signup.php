<?php require_once 'top.php'; ?>


<h1>SIGNUP</h1>

<form id="frmSignup" action="apis/api-signup" method="POST">
  <input name="txtSignupPhone" type="text" placeholder="phone" value="" maxlength="8">
  <input name="txtSignupName" type="text" placeholder="name" value="Lala">
  <input name="txtSignupLastName" type="text" placeholder="last name" value="Lalic">
  <input name="txtSignupEmail" type="text" placeholder="email" value="a@a.com">
  <input name="txtSignupCpr" type="text" placeholder="cpr" value="1234567891">
  <input name="txtSignupPassword" type="password" placeholder="password" value="123456">
  <input name="txtSignupConfirmPassword" type="password" placeholder=" confirm password" value="123456">
  <button>Signup</button>
</form>


<?php 
$sLinkToScript = '<script src="js/signup.js"></script>';
require_once 'bottom.php'; 
?>