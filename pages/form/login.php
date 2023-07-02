<?php 
    include('admincp/config/connect.php');
    if(isset($_POST['dangnhap'])) {
        $taikhoan = $_POST['usernamednnv'];
        $matkhau = md5($_POST['passdnnv']);
        $sql = "SELECT * FROM tbl_admin WHERE username= '".$taikhoan."' AND password= '".$matkhau."' LIMIT 1";
        $row = mysqli_query($mysqli, $sql);
        $count = mysqli_num_rows($row);
        if($count > 0) {
            $_SESSION['dangnhap'] = $taikhoan;
            echo "success";
            // echo'<script>window.location.href = "./admincp/index.php"</script>';
            // header("Location:./admincp/index.php");
        }else {
            echo "fail";
            // echo'<script>alert("Lỗi không đăng nhập được vào admin")</script>';
            // echo'<script>window.location.href = "index.php"</script>';
            // header("Location:index.php");
        }
    }
?>