<?php
session_start();
if (($_POST["phone"] !='') && ($_POST["pass"] !='')){
	$sodienthoai=$_POST['phone'];
	$passwd=$_POST['pass'];
	$matkhau=md5($passwd);
	$con = new mysqli("localhost", "root", "", "ttgs");
	
	$con->set_charset("utf8");
	if ($sodienthoai == "" || $passwd == ""){
		header("location: dangnhap.html");
	}
	else{
		$sql="SELECT
			sdt_kh,
			pass_kh
		FROM
			khachhang
		WHERE
			sd_kh='".$sodienthoai."' AND
			pass_kh='".$matkhau."'";
		//echo $sql;
		$result=$con->query($sql);
		$_SESSION['phone'] = $sodienthoai;
		if ($result->num_rows==1){
			
			setcookie('phone', $sodienthoai, time()+3600);
			setcookie('pass', $matkhau, time()+3600);
			//header("location: thongtincanhan_js.php");
		} else{
			header("location: dangnhap.html");
		}
	
	}
}
$con->close();
?>


