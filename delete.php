<?php
	$ip='localhost';
	$user='prj_10905';
	$pw='FDqWDXA12XIY7Zit';
	$db='prj_10905';
	$id=$_POST['id'];
	$link=new mysqli($ip, $user, $pw, $db);
	$sql="DELETE FROM weight WHERE wid=$id";
	$link->query($sql);
	$link->close();
	header('Location: http://163.23.180.231/~711317/user.php?');
	exit();
?>