<?php
	$ip='localhost';
	$user='prj_10905';
	$pw='FDqWDXA12XIY7Zit';
	$db='prj_10905';
	$id=$_POST['wid'];
	$name=$_POST['name'];
	$link=new mysqli($ip, $user, $pw, $db);
	$sql="TRUNCATE TABLE weight";
	$link->query($sql);
	$sql="TRUNCATE TABLE data";
	$link->query($sql);
	$link->close();
	header('Location: http://163.23.180.231/~711317/index.html?');
	exit();
?>
