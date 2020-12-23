<html>
	<head>
		<link rel="stylesheet" href="http://163.23.180.231/~711317/style.css">
		<link rel="icon" href="http://163.23.180.231/~711317/google_icon.png" type="image/x-icon" />
		<meta charset='utf-8'>
		<title>專題</title>
	</head>
	<body>
		<form action='index.html'>
			<input type='submit' value='返回'/>
		</form>
	</body>
</html>
<?php
	$ip='localhost';
	$user='prj_10905';
	$pw='FDqWDXA12XIY7Zit';
	$db='prj_10905';
	$link=new mysqli($ip, $user, $pw, $db);
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
