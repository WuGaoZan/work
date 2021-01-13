<?php
	$ip='localhost';
	$user='prj_10905';
	$pw='FDqWDXA12XIY7Zit';
	$db='prj_10905';
	$nid=$_POST['id'];
	$weight=$_POST['w'];
	echo $nid.$weight;
	$link=new mysqli($ip, $user, $pw, $db);
	//$sql="INSERT INTO `data`(`nid`, `weight`) VALUES ('$nid','$weight')";
	$sql="INSERT INTO `weight`(`weight`) VALUES ('$weight')";
	$add=$link->query($sql);
	$link->close();
?>