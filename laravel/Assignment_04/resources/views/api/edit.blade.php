<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Edit Task</title>
  <script src="{{ asset('js/lib/jquery.min.js') }}"></script>
</head>

<body>
  <h1>Edit Task</h1>
  <label for="task">Name</label><br>
  <input type="text" name="task"><br>
  <label for="deadline">Deadline</label><br>
  <input type="date" name="deadline"><br>
  <label for="note">Task Note</label><br>
  <input type="text" name="note"><br>
  <button onclick="editTask()">Update</button>

  <script>
    var taskId = window.location.pathname.split('/')[2];
    $.ajax({
      url: "/api/task/" + taskId,
      type: 'GET',
      dataType: 'json', // added data type
      success: function(res) {
        $('[name=task]').val(res.name);
        $('[name=deadline]').val(res.deadline);
        $('[name=note]').val(res.note);
      }
    });

    function editTask() {
      var editedData = {
        name: $('[name=task]').val(),
        deadline: $('[name=deadline]').val(),
        note: $('[name=note]').val(),
      }

      $.ajax({
        url: "/api/task/edit/" + taskId,
        type: 'POST',
        data: editedData,
        dataType: 'json', // added data type
        success: function(res) {
          window.location.replace("/api-show");
        }
      });
    }
  </script>
</body>

</html>