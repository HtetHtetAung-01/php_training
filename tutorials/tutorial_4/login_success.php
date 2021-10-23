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
  <link rel="stylesheet" href="css/style1.css">
</head>

<body>
  <div class="wrapper">
    <h1>Welcome!</h1>
    <p>You are an authenticated user.</p>
    <a href="logout.php" class="btnLogout">Logout</a>
  </div>
</body>

</html>