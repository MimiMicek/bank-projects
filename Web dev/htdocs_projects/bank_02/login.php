
<?php require_once 'top.php';?>

    <h1>LOGIN</h1>

    <form id="frmLogin" action="apis/api-login.php" method="POST">
        <input name="txtLoginPhone" id="txtLoginPhone" type="text" placeholder="phone number">
        <input name="txtLoginPassword" id="txtLoginPassword" type="text" placeholder="password">
        <button>LOGIN</button>
    </form>

<?php 
    $sLinkToScript = '<script src="js/login.js"></script>';
    require_once "bottom.php";
?>
