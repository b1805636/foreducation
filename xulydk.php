<?php
$sodienthoai=$_POST['phone'];
$passwd=$_POST['pass'];
$matkhau=md5($passwd);

$con = new mysqli ("localhost", "root", "", "ttgs");

$con->set_charset("utf8");
$sql="INSERT INTO khachhang(sdt_kh,pass_kh) VALUES ('$sodienthoai', '$matkhau')";


$result=$con->query($sql);
//echo $sql;
header("location: dangnhap.html");
$con->close();
?>