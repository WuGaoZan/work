<?php
session_start();
?>
<html>
	<head>
		<link rel="stylesheet" href="http://163.23.180.231/~711317/style.css">
		<meta http-equiv="refresh" content="1" />
		<meta charset='utf-8'>
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=0.5; user-scalable=0;">
		<!--
		<script language="JavaScript"> 
		var scroll = setInterval(function(){window.scrollTo(0, document.body.scrollHeight)},1000);
		</script>
		-->
		<title>專題</title>
	</head>
	<body>
		<form action="user.php">
			<input type="submit" value="返回"/>
		</form>
	</body>
</html>
<?php
	$ip='localhost';
	$user='prj_10905';
	$pw='FDqWDXA12XIY7Zit';
	$db='prj_10905';
	$link=new mysqli($ip, $user, $pw, $db);
	$sql="select * from user where acc='".$_SESSION['acc']."'";
	$ex=$link->query($sql);
	$data=$ex->fetch_assoc();
	$sel="SELECT * FROM weight WHERE uid=".$data['uid'];
	$sch=$link->query($sel);
	echo '<table border=0 width=1000>';
	echo '<tr>';
	echo '<td>id</td>';
	echo '<td>名字</td>';
	echo '<td>重量</td>';
	echo '</tr>';
	while($data=$sch->fetch_assoc())
	{
		echo '<tr>';
		echo '<td>'.$data['wid'].'</td>';
		echo '<td>'.$data['name'].'</td>';
		echo '<td>'.$data['weight'].'g</td>';
		echo '</tr>';
	}
	echo '</table>';
	$link->close();
?>