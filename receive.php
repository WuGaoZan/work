<?php
$ip=127.0.0.1;
$user='user';
$pw='';
$db='weight';
$nid=$_GET['id'];
$weight=$_GET['w'];
$link=new mysqli($ip, $user, $pw, $db);
if ($link -> connect_errno) {
  echo "連線失敗: " . $link -> connect_error;
  exit();
}
$sql="INSERT INTO `weight`(`nid`, `weight`) VALUES ($nid,$weight)";
$add=$link->query($sql);
$link->close();
?>
