<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial_4</title>
  <link rel="stylesheet" href="css/style1.css">
</head>

<body>
  <div class="wrapper">
    <form action="login.php" method="POST">
      <h1>Login Form</h1>
      <p class="error_message">Invalid User ID or Password!</p><br>
      <label for="id">User ID</label><br>
      <input type="text" name="id" id="id"><br>
      <label for="password">Password</label><br>
      <input type="password" name="password" id="password"><br>
      <input type="submit" value="Login" class="btnLogin">
    </form>
  </div>
</body>

</html>