<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial_3</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <h1>Tutorial_3</h1>
  <form action="index.php" method="post">
    <input type="date" name="bdate" value="<?php if (!empty($_POST["bdate"])) {
                                              echo $_POST["bdate"];
                                            } ?>">
    <input name="submit" type="submit" class="btn" value="Calculate My Age!">
  </form>
  <?php
  $age = "";
  if (!empty($_POST["bdate"])) {
    $age = calAge($_POST["bdate"]);
    echo "<br/><b>Your Age : <b>" . $age;
  }
  function calAge($date)
  {
    $timestamp = strtotime($date);

    $strTime = array("second", "minute", "hour", "day", "month", "year");
    $length = array("60", "60", "24", "30", "12", "10");

    $currentTime = time();
    if ($currentTime >= $timestamp) {
      $diff = time() - $timestamp;
      for ($i = 0; $diff >= $length[$i] && $i < count($length) - 1; $i++) {
        $diff = $diff / $length[$i];
      }
      $diff = round($diff);
      return $diff . " " . $strTime[$i] . "(s)";
    }
  }
  ?>
</body>

</html>