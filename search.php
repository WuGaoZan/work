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
$id=$_POST['wid'];
$name=$_POST['name'];
$link=new mysqli($ip, $user, $pw, $db);
if ($link -> connect_errno) {
  echo "connect fail: " . $link -> connect_error;
}
if($id!="")
{
	//echo $id;
	$sql="SELECT * FROM weight WHERE wid=$id";
	$sel=$link->query($sql);
	echo '<table border=0 width=250>';
	echo '<tr>';
	echo '<td>wid</td>';
	echo '<td>name</td>';
	echo '<td>weight</td>';
	echo '</tr>';
	while($data=$sel->fetch_assoc())
	{
		echo '<tr>';
		echo '<td>'.$data['wid'].'</td>';
		echo '<td>'.$data['name'].'</td>';
		echo '<td>'.$data['weight'].'</td>';
		echo '</tr>';
	}
}
else if($name!="")
{
	echo $name;
	$sql="SELECT * FROM weight WHERE name LIKE '%$name%'";
	$sel=$link->query($sql);
	echo '<table border=0 width=250>';
	echo '<tr>';
	echo '<td>wid</td>';
	echo '<td>name</td>';
	echo '<td>weight</td>';
	echo '</tr>';
	while($data=$sel->fetch_assoc())
	{
		echo '<tr>';
		echo '<td>'.$data['wid'].'</td>';
		echo '<td>'.$data['name'].'</td>';
		echo '<td>'.$data['weight'].'</td>';
		echo '</tr>';
	}
}
else
{
	echo 'error';
}
$link->close();
?>
