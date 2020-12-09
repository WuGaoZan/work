<?php
	$ip='localhost';
	$user='prj_10905';
	$pw='FDqWDXA12XIY7Zit';
	$db='prj_10905';
	$id=$_POST['wid'];
	$name=$_POST['name'];
	$link=new mysqli($ip, $user, $pw, $db);
	if($id!="")
	{
		$sql="SELECT SUM(wid) AS SUM FROM weight WHERE 1";
		$sel=$link->query($sql);
		$data_1=$sel->fetch_assoc();
		$sql="SELECT * FROM weight WHERE wid=$id";
		$sel=$link->query($sql);
		$data_2=$sel->fetch_assoc();
		if($data_1['SUM']==""||$data_2['wid']!=$id)
		{
			$link->close();
			echo	"搜尋失敗
					<html>
						<head>
							<meta charset='utf-8'>
							<title>專題</title>
						</head>
						<body>
							<form action='index.html'>
								<input type='submit' value='返回'/>
							</form>
						</body>
					</html>";
		}
		else
		{
			echo   "<html>
						<head>
							<meta charset='utf-8'>
							<title>專題</title>
						</head>
						<body>
							<form action='index.html'>
								<input type='submit' value='返回'/>
							</form>
							<form method='post' action='delete.php'>
								<input type='hidden' name='id' value=$id>
								<input type='hidden' name='name' value=$name>
								<input type='submit' value='刪除'/>
							</form>
							<form method='post' action='update.php'>
								名字:
								<input type='text' onKeypress='if (event.keyCode <= 65 || event.keyCode >= 117) event.returnValue = false;' name='name'/>
								<input type='hidden' name='id' value=$id>
								<input type='hidden' name='old_name' value=$name>
								<input type='submit' value='更新'/>
							</form>
						</body>
					</html>";
		
			$sql="SELECT * FROM weight WHERE wid=$id";
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
				echo '<td>'.$data['weight'].'</td>';
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
