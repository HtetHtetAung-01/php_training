<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_5</title>
    <link rel="stylesheet" href="./css/common.css">
</head>

<body>
    <div class="wrapper">
        <h1>Tutorial_5</h1>
        <?php
        $directory = "files";
        $list = scandir($directory);
        for ($i = 2; $i < count($list); $i++) {
            $name = $list[$i];
            echo "<b>" . $name . "</b><br>";
            echo readingFile($directory . "/" . $name) . "<br>";
        }
        function readingFile($name)
        {
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            $f = fopen($name, "r") or exit("Unable to open file!");
            while (!feof($f)) {
                echo fgets($f) . "<br/>";
            }
            fclose($f);
        }
        ?>
    </div>
</body>

</html>