<?php
$ip='localhost';
$user='*********';
$pw='****************';
$db='*********';
$link=new mysqli($ip, $user, $pw, $db);
if ($link -> connect_errno) {
  echo "Failed to connect to MySQL: " . $link -> connect_error;
  exit();
}
$sel="SELECT * FROM data WHERE 1";
$sch=$link->query($sel);
if($data=$sch->fetch_assoc())
{
	$sel="SELECT SUM(wid) AS SUM FROM data WHERE 1";
	$sch=$link->query($sel);
	$data=$sch->fetch_assoc();
	if($data['SUM']==10)
	{
		$sel="SELECT SUM(weight) AS SUM FROM data WHERE 1";
		$sch=$link->query($sel);
		$data_s=$sch->fetch_assoc();
		$sum=$data_s['SUM'];
		$selt="INSERT INTO `weight`(`weight`) VALUES ($sum)";
		$ad=$link->query($selt);
		$clr="TRUNCATE TABLE data";
		$st=$link->query($clr);
	}
}
$sel="SELECT * FROM weight WHERE 1";
$sch=$link->query($sel);
echo '<table border=0 width=250>';
echo '<tr>';
echo '<td>wid</td>';
echo '<td>weight</td>';
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
