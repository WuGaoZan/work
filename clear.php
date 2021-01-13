<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="http://163.23.180.231/~711317/style.css">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
		<title>專題</title>
	</head>
	<body>
		<form method="post" action="">
			<input type="submit" name="clr" value="清重量"/>
			<input type="submit" name="clr" value="清資料"/>
		</form>
	</body>
</html>
<?php
	$ip='localhost';
	$user='prj_10905';
	$pw='FDqWDXA12XIY7Zit';
	$db='prj_10905';
	$clr=$_POST['clr'];
	$link=new mysqli($ip, $user, $pw, $db);
	if($clr=="清重量")
	{
		$sql="TRUNCATE TABLE weight";
		$link->query($sql);
	}
	elseif($clr=="清資料")
	{
		$sql="TRUNCATE TABLE data";
		$link->query($sql);
	}
	else
	{
	}
	$link->close();
?>