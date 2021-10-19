<?php

include('libs/phpqrcode/qrlib.php');

function getUsernameFromEmail($email)
{
	$find = '@';
	$pos = strpos($email, $find);
	$username = substr($email, 0, $pos);
	return $username;
}

if (isset($_POST['submit'])) {
	$tempDir = 'temp/';
	$email = $_POST['mail'];
	$subject =  $_POST['subject'];
	$filename = getUsernameFromEmail($email);
	$body =  $_POST['msg'];
	$codeContents = 'mailto:' . $email . '?subject=' . urlencode($subject) . '&body=' . urlencode($body);
	QRcode::png($codeContents, $tempDir . '' . $filename . '.png', QR_ECLEVEL_L, 5);
}
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
	<title>Tutorial_7</title>
	<link rel="stylesheet" href="libs/css/bootstrap.min.css">
	<link rel="stylesheet" href="libs/style.css">
	<script src="libs/navbarclock.js"></script>
</head>

<body onload="startTime()">
	<div class="wrapper">
		<h1><strong>Tutorial_7</strong></h1>
		<div class="output">
			<div class="input-field">
				<h4>Please fill out all fields:</h4>
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control form-input" name="mail" placeholder="Enter your Email" value="<?php echo @$email; ?>" required />
					</div>
					<div class="form-group">
						<label>Subject</label>
						<input type="text" class="form-control form-input" name="subject" placeholder="Enter your Email Subject" value="<?php echo @$subject; ?>" required pattern="[a-zA-Z .]+" />
					</div>
					<div class="form-group">
						<label>Message</label>
						<input type="text" class="form-control form-input" name="msg" value="<?php echo @$body; ?>" required pattern="[a-zA-Z0-9 .]+" placeholder="Enter your message"></textarea>
					</div>
					<div class="form-group">
						<input type="submit" name="submit" class="btn btn-primary submitBtn btn-submit" />
					</div>
				</form>
			</div>
			<?php
			if (!isset($filename)) {
				$filename = "author";
			}
			?>
			<div class="qr-field">
				<h4>QR Code Result: </h4>
				<center>
					<div class="qrframe">
						<?php echo '<img src="temp/' . @$filename . '.png"><br>'; ?>
					</div>
					<a class="btn btn-primary submitBtn btn-download" href="download.php?file=<?php echo $filename; ?>.png ">Download QR Code</a>
				</center>
			</div>
		</div>
	</div>
	<!-- .wrapper -->
</body>
<footer></footer>

</html>