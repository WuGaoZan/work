<html>
				<head>
					<link rel='stylesheet' href='http://163.23.180.231/~711317/style.css'>
					<meta charset='utf-8'>
					<title>專題</title>
					<link rel='icon' href='http://163.23.180.231/~711317/google_icon.png' type='image/x-icon' />
				</head>
				<body>
					<form method='post'>
						名字:
						<input autocomplete="off" type='text' name='n'/>
						</br>
						重量:
						<input autocomplete="off" type='text' name='w'/>
						<input type='submit' name='a' value='新增'/>
						</br>
						<input type='submit' name='a' value='隨機'/>
					</form>
					<form action='index.html'>
						<input type='submit' value='返回'/>
					</form>
				</body>
			</html>
<?php
	$name=$_POST['n'];
	$weight=$_POST['w'];
	$sub=$_POST['a'];
	$ip='localhost';
	$user='prj_10905';
	$pw='FDqWDXA12XIY7Zit';
	$db='prj_10905';
	$link=new mysqli($ip, $user, $pw, $db);
	if($sub=='新增')
	{
		$sql="INSERT INTO `weight`(`name`, `weight`) VALUES ('".$name."','".$weight."')";
		$add=$link->query($sql);
		echo "a".$name.$weight;
	}
	else if($sub=='隨機')
	{
		$weight=rand(0,1000);
		$sql="INSERT INTO `weight`(`name`, `weight`) VALUES ('Unknown_Name',$weight)";
		$add=$link->query($sql);
	}
	else
	{
	}
	$link->close();
?>
