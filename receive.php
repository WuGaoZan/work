<?php
	$ip='localhost';
	$user='prj_10905';
	$pw='FDqWDXA12XIY7Zit';
	$db='prj_10905';
	$nid=$_GET['id'];
	$weight=$_GET['w'];
	$link=new mysqli($ip, $user, $pw, $db);
	$sql="INSERT INTO `data`(`nid`, `weight`) VALUES ($nid,$weight)";
	$add=$link->query($sql);
	$sel="SELECT * FROM data WHERE 1";
	$sch=$link->query($sel);
	if($data=$sch->fetch_assoc())
	{
		$sel="SELECT SUM(wid) AS SUM FROM data WHERE 1";
		$sch=$link->query($sel);
		$data=$sch->fetch_assoc();
		if($data['SUM']>=10)
		{
			$sel="SELECT SUM(weight) AS SUM FROM data WHERE 1";
			$sch=$link->query($sel);
			$data_s=$sch->fetch_assoc();
			$sum=$data_s['SUM'];
			$selt="INSERT INTO `weight`(`name`,`weight`) VALUES ('Unknown_Name',$sum)";
			$ad=$link->query($selt);
			$clr="TRUNCATE TABLE data";
			$st=$link->query($clr);
		}
	}
	$link->close();
?>
