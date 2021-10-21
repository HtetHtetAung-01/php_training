<?php
  include 'database.php';
  $sql = "select * from account";
  $result = $conn->query($sql);
  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    if (isset($_GET['id']) && $row['id'] == $_GET['id']) {
      echo '<form class="form-inline m-2" action="update.php" method="POST">';
      echo '<td><input type="text" class="form-control" name="year" value="'.$row['year'].'"></td>';
      echo '<td><input type="text" class="form-control" name="purchase" value="'.$row['purchase'].'"></td>';
      echo '<td><input type="text" class="form-control" name="sale" value="'.$row['sale'].'"></td>';
      echo '<td><input type="text" class="form-control" name="profit" value="'.$row['profit'].'"></td>';
      echo '<td><button type="submit" class="btn btn-primary">Save</button></td>';
      echo '<input type="hidden" name="id" value="'.$row['id'].'">';
      echo '</form>';
    } else {
    echo "<td>" . $row['year'] . "</td>";
    echo "<td>" . $row['purchase'] . "</td>";
    echo "<td>" . $row['sale'] . "</td>";
    echo "<td>" . $row['profit'] . "</td>";
    echo '<td><a class="btn btn-primary" href="index.php?id=' . $row['id'] . '" role="button">Update</a></td>';
  }
  echo '<td><a class="btn btn-danger" href="delete.php?id=' . $row['id'] . '" role="button">Delete</a></td>';
  echo "</tr>";
}
  $conn->close();
