
<?php
$ip='127.0.0.1';
$user='user';
$pw='';
$db='weight';
$link=new mysqli($ip, $user, $pw, $db);
if ($link -> connect_errno) {
  echo "Failed to connect to MySQL: " . $link -> connect_error;
  exit();
}
$sel="SELECT * FROM weight WHERE 1";
$sh=$link->query($sel);
echo '<table border=0 width=250>';
echo '<tr>';
echo '<td>wid</td>';
echo '<td>nid</td>';
echo '<td>weight</td>';
echo '</tr>';
while($data=$sh->fetch_assoc())
{
	echo '<tr>';
	echo '<td>'.$data['wid'].'</td>';
	echo '<td>'.$data['nid'].'</td>';
	echo '<td>'.$data['weight'].'</td>';
	echo '</tr>';
}
echo '</table>';
$sel="SELECT SUM(weight) AS SUM FROM weight WHERE 1";
$sh=$link->query($sel);
$data=$sh->fetch_assoc();
echo '</br></br>SUM(weight)='.$data['SUM'];
$link->close();
?>
