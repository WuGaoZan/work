<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="http://163.23.180.231/~711317/style.css">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=0.5; user-scalable=0;">
		<title>專題</title>
	</head>
	<body>
		<form action="weight.php">
			<center><input type="submit" value="重量"/>
		</form>
		<form action="cmb.php">
			<input type="submit" value="組合"/>
		</form>
		<form method="post" action="search.php">
			<input required autocomplete="off" type="text" placeholder="id" oninput = "value=value.replace(/[^\d]/g,'')" maxlength="11" name="wid"/>
			</br>
			<input type="submit" value="搜尋"/>
		</form>
		<form action="index.php" method="post">
			<input type="submit" value="返回"/>
		</form>
	</body>
</html>