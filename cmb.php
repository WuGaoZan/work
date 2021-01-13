<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="http://163.23.180.231/~711317/style.css">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=0.5; user-scalable=0;">
		<title>專題</title>
	</head>
	<body>
		<form action="user.php">
			<input type="submit" value="返回"/>
		</form>
		<?php
			$i=0;
			$ip='localhost';
			$user='prj_10905';
			$pw='FDqWDXA12XIY7Zit';
			$db='prj_10905';
			$link=new mysqli($ip, $user, $pw, $db);
			$sel="SELECT * FROM data WHERE 1";
			$sch=$link->query($sel);
			echo '<form method="post" action="cmb.php">';
			echo '<table border=0 width=1000>';
			echo '<tr>';
			echo '<td>id</td>';
			echo '<td>wid</td>';
			echo '<td>重量</td>';
			echo '</tr>';
			while($data=$sch->fetch_assoc())
			{
				$wid=$data['wid'];
				echo '<tr>';
				echo '<td>'.$wid.'</td>';
				echo '<td>'.$data['nid'].'</td>';
				echo '<td>'.$data['weight'].'KG</td>';
				echo '<td><input type="checkbox" name="box[]" value="'.$wid.'"></td>';
				echo '</tr>';
				$i=$i+1;
			}
			$i=$i-1;
			if($i<0)
				$i=0;
			echo '</table>';
			echo '<input type="submit" name="cmb" value="組合">';
			echo '</form>';
			if(isset($_POST['cmb']))
			{
				$cmb=$_POST['cmb'];
				if($cmb=="組合")
				{
					if(isset($_POST['box']))
					{
						$a=$_POST['box'];
						while($i>=0)
						{
							if(!empty($a[$i]))
							{
								$sql="SELECT * FROM data where wid=".$a[$i];
								$ex=$link->query($sql);
								$data=$ex->fetch_assoc();
								$c=$c+$data['weight'];
								$del="delete FROM data where wid=".$a[$i];
								$s=$link->query($del);
							}
							$i=$i-1;
						}
						$sql="select * from user where acc=".$_SESSION['acc'];
						$ex=$link->query($sql);
						$data=$ex->fetch_assoc();
						$add="INSERT INTO `weight`(`uid`,`weight`) VALUES ('".$data['uid']."','$c')";
						$s=$link->query($add);
						header("Location:http://163.23.180.231/~711317/user.php");
					}
				}
			}
			$link->close();
		?>
	</body>
</html>