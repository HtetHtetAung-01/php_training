<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>

<body>
  <?php
  $email = $_GET['email'];
  $password = $_GET['password'];
  if ($email && $password)
    echo  "Hello, you have provided <b>$email</b> as your login ID ",
    "and your password is <b>$password</b>.";
  else
    echo "Login ID or password missing! ",
    "Please <a href='index.php'>try again</a>.";
  ?>
</body>

</html>