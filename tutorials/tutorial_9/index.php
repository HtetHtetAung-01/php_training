<?php
$connect = mysqli_connect("localhost", "root", "my1234", "crud");
$query = "SELECT * FROM account";
$result = mysqli_query($connect, $query);
$chart_data = '';
while ($row = mysqli_fetch_array($result)) {
  $chart_data .= "{ year:'" . $row["year"] . "', profit:" . $row["profit"] . ", purchase:" . $row["purchase"] . ", sale:" . $row["sale"] . "}, ";
}
$chart_data = substr($chart_data, 0, -2);
?>
<!DOCTYPE html>
<html>

<head>
  <title>Tutorial_9</title>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

</head>

<body>
  <div class="container" style="width:900px;">
    <h1 align="center">Tutorial_9</h1>
    <h2 align="center"> 3 Years : Purchase, Sale and Profit Data</h2>
    <br /><br />
    <div id="chart"></div>
  </div>
</body>

</html>

<script>
  Morris.Bar({
    element: 'chart',
    data: [<?php echo $chart_data; ?>],
    xkey: 'year',
    ykeys: ['profit', 'purchase', 'sale'],
    labels: ['Profit', 'Purchase', 'Sale'],
    hideHover: 'auto',
    stacked: true
  });
</script>