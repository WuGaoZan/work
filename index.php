<?php
function getLocalIP()
	{
		$preg = "/\A((([0-9]?[0-9])|(1[0-9]{2})|(2[0-4][0-9])|(25[0-5]))\.){3}(([0-9]?[0-9])|(1[0-9]{2})|(2[0-4][0-9])|(25[0-5]))\Z/";
		//獲取作業系統為win2000/xp、win7的本機IP真實地址
		exec("ipconfig", $out, $stats);
		if (!empty($out))
		{
			foreach ($out AS $row)
			{
				if (strstr($row, "IP") && strstr($row, ":") && !strstr($row, "IPv6"))
				{
					$tmpIp = explode(":", $row);
					if (preg_match($preg, trim($tmpIp[1])))
					{
						return trim($tmpIp[1]);
					}
				}
			}
		}
	}
$nid=$_GET['id'];
$weight=$_GET['w'];
$link=new mysqli(getLocalIP(), 'user', '548794877414', 'weight');
if ($link -> connect_errno)
{
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
$sql="INSERT INTO `test`(`nid`, `weight`) VALUES ($nid,$weight)";
$addata=$link->query($sql);
$select="SELECT * FROM test WHERE 1";
$search=$link->query($select);
echo '<table border=0 width=250>';
echo '<tr>';
echo '<td>tid</td>';
echo '<td>nid</td>';
echo '<td>weight</td>';
echo '</tr>';
while($data=$search->fetch_assoc())
{
	echo '<tr>';
	echo '<td>'.$data['tid'].'</td>';
	echo '<td>'.$data['nid'].'</td>';
	echo '<td>'.$data['weight'].'</td>';
	echo '</tr>';
}
echo '</table>';
$select="SELECT SUM(weight) AS SUM FROM test WHERE 1";
$search=$link->query($select);
$data=$search->fetch_assoc();
echo '</br></br>SUM(weight)='.$data['SUM'];
$link->close();
?>
