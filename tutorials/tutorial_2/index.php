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
  $num=6;
  for($outer=1;$outer<=$num;$outer++) {
      for($inner=1;$inner<=(2*$num)-1;$inner++) {
          if($inner>=$num-($outer-1) && $inner<=$num+($outer-1)) {
              echo "*";
          } else {
              echo "&nbsp;&nbsp;";
          }
      }
      echo "</br>";
  } 
  for($outer=$num-1;$outer>=1;$outer--) {
      for($inner=1;$inner<=(2*$num)-1;$inner++) {
          if($inner>=$num-($outer-1) && $inner<=$num+($outer-1)) {
              echo "*";
          } else {
              echo "&nbsp;&nbsp;";
          }
      }
      echo "</br>";
  }
  echo "</p>";
  ?>
</body>

</html>