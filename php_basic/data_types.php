<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Types</title>
</head>

<body>
  <h1>PHP Data Types Example</h1>
  <p>
    <b>Variables</b><br>
    <?php
    $txt = "Hello world!";
    $x = 5;
    $y = 10.5;
    $str = 'Testing php "01"';
    $color = array("Red", "Green", "Blue", "Black", "White");
    echo "Text: " . $txt . "<br>Sum: " . $x + $y . "<br>";
    echo "<b>Strings</b><br>";
    echo $str . "<br>";
    define("Testing", "Data Types Testing!");
    echo '<strong>Constant: </strong>' . Testing . '<br>';
    echo "<b>Math: 0, 27, 99, 7, -2, -4</b><br>";
    echo 'Smallest Number: ' . (min(0, 27, 99, 7, -2, -4) . '<br>');
    echo 'Largest Number: ' . (max(0, 27, 99, 7, -2, -4) . '<br>');
    echo "<b>Arrays</b><br>";
    sort($color);
    $colorLength = count($color);
    echo "Number of Colors: " . count($color) . "<br><b>Sorting Arrays</b><br>";
    for ($x = 0; $x < $colorLength; $x++) {
      echo $color[$x];
      echo "<br>";
    }
    ?>
  </p>
</body>

</html>