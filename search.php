<?php
	session_start();
	$ip='localhost';
	$user='prj_10905';
	$pw='FDqWDXA12XIY7Zit';
	$db='prj_10905';
	$id=$_POST['wid'];
	$name=$_POST['name'];
	$link=new mysqli($ip, $user, $pw, $db);
	$sql="select * from user where acc='".$_SESSION['acc']."'";
	$ex=$link->query($sql);
	$data=$ex->fetch_assoc();
	$uid=$data['uid'];
	if($id!="")
	{
		$sql="SELECT SUM(wid) AS SUM FROM weight WHERE 1";
		$sel=$link->query($sql);
		$data_1=$sel->fetch_assoc();
		$sql="SELECT * FROM weight WHERE wid=$id and uid=".$uid;
		$sel=$link->query($sql);
		$data_3=$sel->fetch_assoc();
		$sql="SELECT * FROM weight WHERE wid=$id";
		$sel=$link->query($sql);
		$data_2=$sel->fetch_assoc();
		if($data_1['SUM']==""||$data_2['wid']!=$id||$data_3['uid']!=$uid)
		{
			$link->close();
			echo	"搜尋失敗
					<html>
						<head>
							<link rel='stylesheet' href='http://163.23.180.231/~711317/style.css'>
							<meta charset='utf-8'>
							<meta name='viewport' content='width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;'>
							<title>專題</title>
						</head>
						<body>
							<form action='user.php'>
								<input type='submit' value='返回'/>
							</form>
						</body>
					</html>";
		}
		else
		{
			echo   "<html>
						<head>
							<link rel='stylesheet' href='http://163.23.180.231/~711317/style.css'>
							<meta charset='utf-8'>
							<meta name='viewport' content='width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;'>
							<title>專題</title>
						</head>
						<body>
							<form action='user.php'>
								<input type='submit' value='返回'/>
							</form>
							<form method='post' action='delete.php'>
								<input type='hidden' name='id' value=$id>
								<input type='hidden' name='name' value=$name>
								<input type='submit' value='刪除'/>
							</form>
							<form method='post' action='update.php'>
								名字:
								<input autocomplete='off' type='text' name='name'/>
								<input type='hidden' name='id' value=$id>
								<input type='hidden' name='old_name' value=$name>
								<input type='submit' value='更新'/>
							</form>
						</body>
					</html>";
			
			$sql="SELECT * FROM weight WHERE wid=$id and uid=".$uid;
			$sel=$link->query($sql);
			echo '<table border=0 width=250>';
			echo '<tr>';
			echo '<td>id</td>';
			echo '<td>名字</td>';
			echo '<td>重量</td>';
			echo '</tr>';
			while($data=$sel->fetch_assoc())
			{
				echo '<tr>';
				echo '<td>'.$data['wid'].'</td>';
				echo '<td>'.$data['name'].'</td>';
				echo '<td>'.$data['weight'].'KG</td>';
				echo '</tr>';
			}
		}
	}
	else
	{
		$link->close();
		header('Location: http://163.23.180.231/~711317/index.html?');
		exit();
	}
	$link->close();
?>