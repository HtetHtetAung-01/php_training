<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial_6</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div id="wrap">
    <div id="gallery">
      <?php
      $list = scandir("photos");
      for ($i = 2; $i < count($list); $i++) {
        $name = $list[$i];
        echo "<img src='photos/$name' width='200'>";
      }
      ?>
    </div>
    <div id="form">
      <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="photo">Choose a Photo</label>
        <input type="file" name="photo" id="photo">
        <input type="submit" value="Upload" />
      </form>
    </div>
  </div>
</body>

</html>