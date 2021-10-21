<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

  <div class="container">

    <h1>Tutorial_8</h1>
    <p>CRUD : Create, read, update, and delete records below.</p>
    <table class="table">
      <tbody>
        <?php include 'read.php'; ?>
      </tbody>
    </table>
    <form class="form-inline m-2" action="create.php" method="POST">
      <label for="year">Year:</label>
      <input type="text" class="form-control m-2" id="year" name="year" size="5">
      <label for="purchase">Purchase:</label>
      <input type="text" class="form-control m-2" id="purchase" name="purchase" size="10">
      <label for="sale">Sale:</label>
      <input type="text" class="form-control m-2" id="sale" name="sale" size="10">
      <label for="profit">Profit:</label>
      <input type="text" class="form-control m-2" id="profit" name="profit" size="10">
      <button type="submit" class="btn btn-primary">Add</button>
    </form>

  </div>
</body>

</html>