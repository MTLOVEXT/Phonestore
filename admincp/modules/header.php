
<p>
	<a style="text-decoration: none;color:blue;padding:5px;background-color: gold;border-radius: 11px;" href="index.php?action=dangxuat=1">Đăng xuất: 
		<?php 
		if(isset($_SESSION['user'])){
			echo $_SESSION['user'];
		}	 
		?>
	</a>
</p>

<?php
	if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
		unset($_SESSION['dangnhap']);
		header('Location:../../index.php');
	}
?>
