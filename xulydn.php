<?php
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
			sdt_kh='".$sodienthoai."' AND
			pass_kh='".$matkhau."'";
		//echo $sql;
		$result=$con->query($sql);
		if ($result->num_rows == 1){
			setcookie('phone', $sodienthoai, time()+3600);
			setcookie('pass', $matkhau, time()+3600);
			header("location: home.php");
		} else{
			header("location: dangnhap.html");
		}
	
	}
}
$con->close();
?>


