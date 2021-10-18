<?php
session_start();
$auth = isset($_SESSION['auth']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial_4</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="wrapper">
    <?php if ($auth) { ?>
      <h1>Welcome!</h1>
      <p>You are an authenticated user.</p>
      <a href="logout.php" class="btnLogout">Logout</a>
    <?php } else { ?>
      <form action="login.php" method="POST">
        <h1>Login Form</h1>
        <label for="id">User ID</label><br>
        <input type="text" name="id" id="id"><br>
        <label for="password">Password</label><br>
        <input type="password" name="password" id="password"><br>
        <input type="submit" value="Login" class="btnLogin">
      </form>
    <?php } ?>
  </div>
</body>

</html>