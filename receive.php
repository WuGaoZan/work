<?php
$ip='localhost';
$user='prj_10905';
$pw='FDqWDXA12XIY7Zit';
$db='prj_10905';
$nid=$_GET['id'];
$weight=$_GET['w'];
$link=new mysqli($ip, $user, $pw, $db);
if ($link -> connect_errno) {
  echo "connect fail: " . $link -> connect_error;
}
$sql="INSERT INTO `data`(`nid`, `weight`) VALUES ($nid,$weight)";
$add=$link->query($sql);
$link->close();
?>
