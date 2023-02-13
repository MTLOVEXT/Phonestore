<?php
	if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
		unset($_SESSION['dangnhap']);
		header('Location:../index.php');
	}
?>
<p><a style="text-decoration: none;color:blue;padding:5px;background-color: gold;border-radius: 11px;" href="index.php?dangxuat=1">Đăng xuất <?php if(isset($_SESSION['dangnhap'])){
		echo $_SESSION['dangnhap'];

	} ?></a></p>