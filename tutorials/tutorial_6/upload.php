<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial_6</title>
</head>

<body>
  <?php
  $name = $_FILES["photo"]["name"];
  $tmp = $_FILES["photo"]["tmp_name"];
  $type = $_FILES["photo"]["type"];
  if ($type == "image/jpeg" || $type == "image/png" || $type == "image/gif" || $type == "image/jpg") {
    move_uploaded_file($tmp, "photos/$name");
  }
  header("location: index.php");
  ?>
</body>

</html>