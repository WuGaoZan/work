<?php
	$ip='localhost';
	$user='prj_10905';
	$pw='FDqWDXA12XIY7Zit';
	$db='prj_10905';
	$id=$_POST['id'];
	$name=$_POST['name'];
	$old_name=$_POST['old_name'];
	$link=new mysqli($ip, $user, $pw, $db);
	echo   "<html>
				<head>
					<link rel='stylesheet' href='http://163.23.180.231/~711317/style.css'>
					<link rel='icon' href='http://163.23.180.231/~711317/google_icon.png' type='image/x-icon' />
					<meta charset='utf-8'>
					<title>專題</title>
				</head>
				<body>
					<form method='post' action='search.php'>
						<input type='submit' value='返回'/>
						<input type='hidden' name='wid' value=$id>
						<input type='hidden' name='name' value=$old_name>
					</form>
				</body>
			</html>";
	if($name!="")
	{
		$sql="UPDATE weight SET name = '$name' WHERE wid = $id";
		$state=$link->query($sql);
		if($state)
		{
			$link->close();
			header('Location: http://163.23.180.231/~711317/index.html?');
			exit();
		}
		else
		{
			echo $id.$name;
			echo '更新失敗';
		}
	}
	else
	{
		echo '更新失敗';
	}
	$link->close();
?>
