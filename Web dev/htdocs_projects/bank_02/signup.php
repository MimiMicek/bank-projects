
<?php require_once 'top.php';?>

    <h1>SIGNUP</h1>

    <!-- you dont need action when doing ajax, it will be overwritten, only the form tag to hit submit-->
    <form id="frmSignup" action="apis/api-signup" method="POST">
        <input name="txtSignupName" id="txtSignupName" type="text" placeholder="Name"value="AA">
        <input name="txtSignupLastName" id="txtSignupLastName" type="text" placeholder="Last name" value="AAA">
        <input name="txtSignupEmail" id="txtSignupEmail" type="email" placeholder="Email" value="a@a.com">
        <input name="txtSignupCpr" id="txtSignupCpr" type="text" placeholder="CPR number" value="0405995656">
        <input name="txtSignupPhone" id="txtSignupPhone" type="text" placeholder="phone number" value="" maxlength="8">
        <input name="txtSignupPassword" id="txtSignupPassword" type="text" placeholder="Password" value="">
        <input name="txtSignupConfirmPassword" id="txtSignupConfirmPassword" type="text" placeholder="Type Password again" value="">
        <button>Signup</button>
    </form>



<?php 
    $sLinkToScript = '<script src="js/signup.js"></script>';
    require_once "bottom.php";
?>
