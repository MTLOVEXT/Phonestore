<?php
include('admincp/config/connect.php');
if (isset($_POST['dangnhap'])) {
    $taikhoan = $_POST['usernamednnv'];
    $matkhau = md5($_POST['passdnnv']);
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
?>

<div id="floginnv" class="modal">
    <form id="login-form" class="modal-content animate" autocomplete="off" method="POST">
        <div class="imgcontainer">
            <span onclick="document.getElementById('floginnv').style.display='none'" class="close"
                title="Close Modal">&times;</span>
            <img src="./assets/img/user.jpg" alt="Avatar" class="avatar">
        </div>

        <div class="container">
            <form action="" method="POST">
                <label for="uname"><b>Username</b></label>
                <input id="usernamednnv" type="text" placeholder="Enter Username" name="usernamednnv" required>
                <div id="message" class="error-message"></div>
                <label for="psw"><b>Password</b></label>
                <br />
                <input style="width:89%;" id="passdnnv" type="password" placeholder="Enter Password" name="passdnnv"
                    required>
                <button style="width: 10%;" type="button" id="btndn"><i id="current-icon"
                        class="far fa-eye"></i></button>
                <div id="message" class="error-messageps"></div>
                <button type="submit" name="dangnhap">Login</button>
                <p style="font-size: 2em;" id="result">Welcome Login Staff</p>
                <button onclick="loginformkh()" type="button" name="btn"><i class="fas fa-home"></i></button>
            </form>
        </div>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </form>
</div>
<!-- <script>
  $(document).ready(function() {
    $("#login-form").submit(function(event) {
        // Ngăn chặn sự kiện mặc định của form (tải lại trang)
        event.preventDefault();

        // Lấy giá trị từ form đăng nhập
        var username = $("#usernamednnv").val();
        var password = $("#passdnnv").val();

        // Gửi yêu cầu đăng nhập bằng AJAX
        $.ajax({
            url: "login.php",
            method: "POST",
            data: {username: username, password: password},
            success: function(response) {
                // Xử lý phản hồi từ máy chủ
                if (response == "success") {
                    // Đăng nhập thành công, chuyển hướng đến trang chính
                    window.location.href = "./admincp/index.php";
                } else {
                    // Hiển thị thông báo lỗi đăng nhập
                    window.location.href = "index.php"
                    alert("Incorrect username or password");
                }
            }
        });
    });
  });
</script> -->