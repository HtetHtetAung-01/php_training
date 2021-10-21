<?php
  include 'database.php';
  $year = $_POST["year"];
  $purchase = $_POST["purchase"];
  $sale = $_POST["sale"];
  $profit = $_POST["profit"];
  $sql = "insert into account (year, purchase, sale, profit) values ('$year', '$purchase', '$sale', '$profit')";
  $conn->query($sql);
  $conn->close();
  header("location: index.php");
?>