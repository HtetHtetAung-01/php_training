<?php
  include 'database.php';
  $id = $_GET['id'];
  $sql = "delete from account where id=$id";
  $conn->query($sql);
  $conn->close();
  header("location: index.php");
?>