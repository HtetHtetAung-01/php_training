<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial_2</title>
</head>

<body>
  <h1>Tutorial_2</h1>
  <?php
  echo "<p>";
  for ($i = 1; $i < 6; $i++) {
    for ($j = $i; $j < 6; $j++)
      echo "&nbsp;&nbsp;";
    for ($j = 2 * $i - 1; $j > 0; $j--)
      echo ("&nbsp;*");
    echo "<br>";
  }
  $n = 6;
  for ($i = 6; $i > 0; $i--) {
    for ($j = $n - $i; $j > 0; $j--)
      echo "&nbsp;&nbsp;";
    for ($j = 2 * $i - 1; $j > 0; $j--)
      echo ("&nbsp;*");
    echo "<br>";
  }
  echo "</p>";
  ?>
</body>

</html>