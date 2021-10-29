<?php
$ten=$_POST['name'];
$sodienthoai=$_POST['phone'];
$passwd=$_POST['pass'];
$matkhau=md5($passwd);
$namsinh=$_POST['namsinh'];
$email=$_POST['email'];
$nghenghiep=$_POST['nghe'];
$td=$_POST['td'];
$kinhnghiem=$_POST['kn'];


$con = new mysqli ("localhost", "root", "", "ttgs");

$con->set_charset("utf8");
$sql="INSERT INTO giasu(ten_gs,sdt_gs,email_gs,nghenghiep,trinhdoday,pass_gs,kinhnghiem,namsinh) 
VALUES ('$ten', '$sodienthoai','$email', '$nghenghiep','$td', '$matkhau','$kinhnghiem', '$namsinh')";


$result=$con->query($sql);
//echo $sql;
header("location: lamgiasu.html");
$con->close();
?>