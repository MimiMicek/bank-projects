<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo $sTitle ?></title>
  <link rel="stylesheet" href="app.css">
  <?php echo $sLinkToCss ?? '';?><!-- if this varable sxist i will show it if not i wont show anything -->
  
</head>
<body>
  <nav>
    <a href="">
      <div>Logo</div>
    </a>
    <a href="login.php">
      <div>Login</div>
    </a>
    <a href="signup.php">
      <div>Signup</div>
    </a>
    <a href="about.php">
      <div>About</div>
    </a>
  </nav>
  
</body>
</html>