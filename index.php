<?php
session_start();
$ip='localhost';
$user='prj_10905';
$pw='FDqWDXA12XIY7Zit';
$db='prj_10905';
$link=new mysqli($ip, $user, $pw, $db);
unset($session['acc']);
unset($session['pwd']);
if(isset($_POST['acc']))
{
	$acc=$_POST['acc'];
}
if(isset($_POST['pwd']))
{
	$pwd=$_POST['pwd'];
}
if(isset($_POST['s']))
{
	$s=$_POST['s'];
	$sql="select * from user where acc='$acc'";
	$ex=$link->query($sql);
	$data=$ex->fetch_assoc();
	if(!empty($data['acc']))
	{
		if($s=="登入"&&$acc==$data['acc']&&$pwd==$data['pwd'])
		{
			$_SESSION['acc']=$acc;
			$_SESSION['pwd']=$pwd;
			header("Location:http://163.23.180.231/~711317/user.php");
		}
		elseif($s=="登入")
		{
			echo "<script>alert('帳號或密碼錯誤')</script>";
		}
		else
			echo "<script>alert('此帳號已註冊')</script>";
	}
	else
	{
		if($s=="註冊")
		{
			echo "<script>alert('註冊成功')</script>";
			$sql="insert into user (acc,pwd) VALUES ('$acc','$pwd')";
			$ex=$link->query($sql);
		}
		else
		{
			echo "<script>alert('帳號或密碼錯誤')</script>";
		}
	}
}
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
		<form action="index.php" method="post">
			<center><input required placeholder="請輸入帳號" type="text" name="acc" oninput = "value=value.replace(/[^\w]|_/ig,'')"/></br>
			<input required placeholder="請輸入密碼" type="password" name="pwd" oninput = "value=value.replace(/[^\w]|_/ig,'')"/></br>
			<input type="submit" name="s" value="登入"/>
			<input type="submit" name="s" value="註冊"/>
		</form>
	</body>
</html>