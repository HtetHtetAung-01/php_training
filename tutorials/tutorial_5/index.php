<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_5</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div class="wrapper">
        <h1>Tutorial_5</h1>
        <?php
        include "libs/SimpleXLSX.php";
        $directory = "files";
        $list = scandir($directory);
        for ($file = 2; $file < count($list); $file++) {
            $name = $list[$file];
            echo "<b>" . $name . "</b><br>";
            echo readingFile($directory . "/" . $name) . "<br>";
        }
        function readingFile($name)
        {
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            if ($ext == "csv" || $ext == "xlsx") {
                if ($xlsx = SimpleXLSX::parse($name)) {
                    echo '<table><tbody>';
                    $row = 0;

                    foreach ($xlsx->rows() as $elt) {
                        if ($row == 0) {
                            echo "<tr><th>" . $elt[0] . "</th><th>" . $elt[1] . "</th></tr>";
                        } else {
                            echo "<tr><td>" . $elt[0] . "</td><td>" . $elt[1] . "</td></tr>";
                        }

                        $row++;
                    }

                    echo "</tbody></table>";
                } else {
                    echo SimpleXLSX::parseError();
                }
            } else {
                $f = fopen($name, "r") or exit("Unable to open file!");
                while (!feof($f)) {
                    echo fgets($f) . "<br/>";
                }
                fclose($f);
            }
        }
        ?>
    </div>
</body>

</html>