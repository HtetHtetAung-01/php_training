<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial_4</title>
</head>

<body>
  <?php
  session_start();
  $id = $_POST['id'];
  $password = $_POST['password'];
  if ($id == "admin" && $password == "1111") {
    $_SESSION['auth'] = true;
  }
  header("location: index.php");
  ?>
</body>

</html>