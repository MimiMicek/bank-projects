<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
</head>
<body>
  <h1>LOGIN</h1>
  <style>
    input.invalid{
      border: 2px solid red;
    }
  </style>
  <form action="">
    <input type="text" placeholder="username"
      data-validate="yes" data-type="string" data-min="2" data-max="20">
    <input type="text" placeholder="name"
    data-validate="yes" data-type="string" data-min="2" data-max="20">
    <input type="text" placeholder="price"
    data-validate="yes" data-type="integer" data-min="100" data-max="1000">
    <input type="text" placeholder="email"
    data-validate="yes" data-type="email" data-min="6" data-max="300">
    <button>Validate form 1</button>
  </form>
  <form action="">
    <input type="text" placeholder="username">
    <input type="text" placeholder="username"
      data-validate="yes" data-type="string" data-min="2" data-max="5">
    <button>Validate form 2</button>
  </form>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="validate.js"></script>
</body>
</html>