<html>
<body>
<form action='index.html'>
<input type='submit' value='back'/>
</form>
</body>
</html>
<?php
$ip='localhost';
$user='prj_10905';
$pw='FDqWDXA12XIY7Zit';
$db='prj_10905';
$link=new mysqli($ip, $user, $pw, $db);
if ($link -> connect_errno) {
  echo "Failed to connect to MySQL: " . $link -> connect_error;
  exit();
}
$sel="SELECT * FROM weight WHERE 1";
$sch=$link->query($sel);
echo '<table border=0 width=250>';
echo '<tr>';
echo '<td>wid</td>';
echo '<td>name</td>';
echo '<td>weight</td>';
echo '</tr>';
while($data=$sch->fetch_assoc())
{
	echo '<tr>';
	echo '<td>'.$data['wid'].'</td>';
	echo '<td>'.$data['name'].'</td>';
	echo '<td>'.$data['weight'].'</td>';
	echo '</tr>';
}
echo '</table>';
$link->close();
?>
