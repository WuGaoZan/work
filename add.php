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
			<input type="hidden" value="1" name="id"/>
			<input type="hidden" value="10" name="w"/>
			<input type="submit" value="增加"/>
		</form>
	</body>
</html>
<?php
	$ip='localhost';
	$user='prj_10905';
	$pw='FDqWDXA12XIY7Zit';
	$db='prj_10905';
	$nid=$_POST['id'];
	$weight=$_POST['w'];
	echo $nid.$weight;
	$link=new mysqli($ip, $user, $pw, $db);
	$sql="INSERT INTO `data`(`nid`, `weight`) VALUES ('$nid','$weight')";
	$add=$link->query($sql);
	$sel="SELECT * FROM data WHERE 1";
	$sch=$link->query($sel);
	echo '<table border=0 width=250>';
	echo '<tr>';
	echo '<td>id</td>';
	echo '<td>重量</td>';
	echo '</tr>';
	while($data=$sch->fetch_assoc())
	{
		echo '<tr>';
		echo '<td>'.$data['wid'].'</td>';
		echo '<td>'.$data['weight'].'</td>';
		echo '</tr>';
	}
	echo '</table>';
	$link->close();
?>