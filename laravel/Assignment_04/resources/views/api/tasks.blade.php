<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajax Task List</title>
  <script src="{{ asset('js/lib/jquery.min.js') }}"></script>

</head>

<body>
  <a href="/api-create">Create</a>
  <table>
    <thead>
      <th>id</th>
      <th>name</th>
      <th>deadline</th>
      <th>task_note</th>
      <th>&nbsp;</th>
    </thead>
    <tbody>

    </tbody>
  </table>
</body>
<script type="text/javascript">
  $.ajax({
    url: "/api/task/list",
    type: 'GET',
    dataType: 'json', // added data type
    success: function(res) {
      res.forEach(tasks => {
        $('tbody').append(`
        <tr>
        <td>${tasks.id}</td>
        <td>${tasks.name}</td>
        <td>${tasks.deadline}</td>
        <td>${tasks.note}</td>
        <td><a href="/api-update/${tasks.id}">Update</a></td>
        <td><button onclick="deleteTask(${tasks.id})">Delete</button></td>
        </tr>
        `);
      });
      console.log(res);
    }
  });

  function deleteTask(id) {
    alert(id);
    $.ajax({
      url: `/api/task/delete/${id}`,
      type: 'DELETE',
      success: function(result) {
        alert("success");
        location.reload();
      },
      error: function(result) {
        alert("fail");
      }
    });
  }
</script>

</html>