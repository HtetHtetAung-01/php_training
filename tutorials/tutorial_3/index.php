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
    <input type="date" name="bdate">
    <input name="submit" type="submit" class="btn" value="Calculate My Age!">
  </form>
  <?php
  if (isset($_POST['submit'])) {
    $dob = $_POST['bdate'];
    $bday = new DateTime($dob);
    $age = $bday->diff(new DateTime);
    echo '<br/>';
    echo '<b>Your Birth Date: </b>';
    echo $dob;
    echo '<br>';
    echo '<b>Your Age : </b> ';
    echo $age->y;
    echo ' Years, ';
    echo $age->m;
    echo ' Months, ';
    echo $age->d;
    echo ' Days';
  }
  ?>
</body>

</html>