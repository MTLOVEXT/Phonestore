<?php
include("fsignup.php");
include("flogin.php");
include("fcsignup.php");
// include("./pages/main/toastMessage.php");
include('admincp/config/connect.php');
if (isset($_POST['dangnhapkh'])) {
    $taikhoan = $_POST['username'];
    $matkhau = md5($_POST['password']);

    $sql1 = "SELECT vaitro FROM tbl_dangky WHERE hovaten= '" . $taikhoan . "' AND matkhau= '" . $matkhau . "' LIMIT 1";
    $row1 = mysqli_query($mysqli, $sql1);
    if ($row1->num_rows > 0) {
        // Lấy dữ liệu từ kết quả truy vấn và gán vào biến $vaitro
        $row2 = $row1->fetch_assoc();
        $vaitro = $row2["vaitro"];

        if ($vaitro==2) {
            // chạy user 
            $sql = "SELECT * FROM tbl_dangky WHERE hovaten= '" . $taikhoan . "' AND matkhau= '" . $matkhau . "' LIMIT 1";
            $row = mysqli_query($mysqli, $sql);
            $count = mysqli_num_rows($row);
            if ($count > 0) {
                $row_data = mysqli_fetch_array($row);
                $_SESSION['dangky'] = $row_data['tennv'];
                $_SESSION['email'] = $row_data['email'];
                $_SESSION['id_khachhang'] = $row_data['id_dangky'];
                // echo '<script>showSuccessToast();</script>';
                echo '<script>alert("Bạn đã đăng nhập thành công");</script>';
                echo '<script>window.location.href = "./index.php"</script>';
            } else {
                echo '<script>alert("Lỗi không đăng nhập được")</script>';
            }
        }else {
            // chạy admin
            $sql = "SELECT * FROM tbl_dangky WHERE hovaten= '" . $taikhoan . "' AND matkhau= '" . $matkhau . "' AND  trangthai = 1 LIMIT 1";
            $row = mysqli_query($mysqli, $sql);
            $count = mysqli_num_rows($row);
            if ($count > 0) {
                $row_data = mysqli_fetch_array($row);
                $_SESSION['dangnhap'] = $row_data['tennv'];
                $_SESSION['id_dangnhap'] = $row_data['id_dangky'];
                echo '<script>alert("Đăng nhập vào admin thành công")</script>';
                echo '<script>window.location.href = "./admincp/index.php"</script>';
            } else {
                echo '<script>alert("Tài khoản đã bị khóa hoặc không đúng")</script>';
                echo '<script>window.location.href = "./index.php"</script>';
            }
        }
    
    } else {
        echo '<script>alert("Lỗi không lấy đc vai trò");</script>';
    }

    // $sql = "SELECT * FROM tbl_dangky WHERE hovaten= '" . $taikhoan . "' AND matkhau= '" . $matkhau . "' LIMIT 1";
    // $row = mysqli_query($mysqli, $sql);
    // $count = mysqli_num_rows($row);
    // if ($count > 0) {
    //     $row_data = mysqli_fetch_array($row);
    //     $_SESSION['dangky'] = $row_data['tennv'];
    //     $_SESSION['email'] = $row_data['email'];
    //     $_SESSION['id_khachhang'] = $row_data['id_dangky'];
    //     // echo '<script>showSuccessToast();</script>';
    //     echo '<script>alert("Bạn đã đăng nhập thành công");</script>';
    //     echo '<script>window.location.href = "./index.php"</script>';
    // } else {
    //     echo '<script>alert("Lỗi không đăng nhập được")</script>';
    // }
}
?>

<div id="id01" class="modal">
    <form class="modal-content animate" method="POST">
        <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            <img src="./assets/img/user.jpg" alt="Avatar" class="avatar">
        </div>

        <div class="container">
            <form action="">
                <label for="uname"><b>Username</b></label>
                <input id="usernamedn" type="text" placeholder="Enter Username" name="username" required>
                <div id="message" class="error-message"></div>
                <label for="psw"><b>Password</b></label>
                <br />
                <input style="width:89%;" id="passdnkh" type="password" placeholder="Enter Password" name="password" required>
                <button style="width: 10%;" type="button" id="btndnkh"><i id="current-iconkh" class="far fa-eye"></i></button>
                <div id="message" class="error-messageps"></div>
                <button type="submit" name="dangnhapkh">Login</button>

                <?php 
                    // if(isset($_SESSION['dangky'])) {
                ?>

                <button type="button" onclick="changeform()">Đổi mật khẩu</button>

                <?php
                    // }
                ?>

                <button type="button" onclick="signupform()">Chưa có tài khoản</button>
                <!-- <button onclick="loginformnv()" type="button" id="btnnv" name="btnnv"> <i class="far fa-user"></i></button> -->
            </form>
        </div>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </form>
</div>