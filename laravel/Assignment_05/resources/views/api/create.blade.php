<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
    <script src="{{ asset('js/lib/jquery.min.js') }}"></script>
</head>
<body>
    <h1>Task Create</h1>
    <label for="task">Name</label><br><input type="text" name="task"><br>
    <label for="deadline">Deadline</label><br><input type="date" name="deadline"><br>
    <label for="note">Task Note</label><br><input type="text" name="note"><br>
    <button onclick="createTask()">Create</button>

    <script>
        function createTask() {
            var createdData = {
              name: $('[name=task]').val(),
                deadline: $('[name=deadline]').val(),
                note: $('[name=note]').val(),
            }

            $.ajax({
            url: "/api/task/create/",
            type: 'POST',
            data: createdData,
            dataType: 'json', // added data type
                success: function(res) {
                    window.location.replace("/api-show");
                }
            });
        }
    </script>
</body>
</html>