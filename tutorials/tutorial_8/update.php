<?php
  include 'database.php';
  $id = $_POST['id'];
  $year = $_POST['year'];
  $purchase = $_POST['purchase'];
  $sale = $_POST['sale'];
  $profit = $_POST['profit'];
  $sql = "update account set year='$year', purchase='$purchase', sale='$sale', profit='$profit' where id=$id";
  $result = $conn->query($sql);
  $conn->close();
  header("location: index.php");
?>