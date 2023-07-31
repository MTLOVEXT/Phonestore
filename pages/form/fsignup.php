<?php
if (isset($_POST['dangky'])) {
    $tenh = $_POST['tennv'];
    $ten = ucwords($tenh);
    $username = $_POST['hovaten'];
    $matkhau = md5($_POST['matkhau']);
    $email = $_POST['email'];
    $dienthoai = $_POST['dienthoai'];
    $diachi = $_POST['diachi'];
    $sql_dangky = mysqli_query($mysqli, "INSERT INTO tbl_dangky(tennv,hovaten,matkhau,email,dienthoai,diachi,vaitro) VALUES('" . $ten . "','" . $username . "','" . $matkhau . "','" . $email . "','" . $dienthoai . "','" . $diachi . "',2 )");
    if ($sql_dangky) {
        $_SESSION['dangky'] = $ten;
        $_SESSION['email'] = $email;
        $_SESSION['id_khachhang'] = mysqli_insert_id($mysqli);
        echo '<script>alert("Bạn đã đăng ký thành công")</script>';
        echo '<script>window.location.href = "./index.php"</script>';
        // header('Location:pages/main/index.php?quanly=giohang');
    }
}
?>

<div id="dk" class="formdk">
    <form id="registrationForm" class="formdk-class" action="" method="POST">
        <div class="imgcontainer">
            <span onclick="document.getElementById('dk').style.display='none'" class="close" title="Close Modal">&times;</span>
            <img src="./assets/img/user.jpg" alt="Avatar" class="avatar">
        </div>
        <div class="tb-dk">
            <table class="fmdangky">
                <tr class="fmdangky__tr">
                    <td>Họ và tên</td>
                    <td><input id="tennv" type="text" placeholder="Nguyễn Văn A" name="tennv" required/></td>
                    <td><span id="usernameError" class="warning-signup"></span> </td>
                </tr>
                <tr class="fmdangky__tr">
                    <td>Username</td>
                    <td><input id="username" type="text" placeholder="Username" name="hovaten" required/></td>
                    <td><span id="usernameError" class="warning-signup"></span> </td>
                </tr>
                <tr class="fmdangky__tr">
                    <td>Password</td>
                    <td><input id="password" type="password" placeholder="Password" name="matkhau" required/></td>
                    <td><span id="passwordError" class="warning-signup"></span> </td>
                </tr>
                <tr class="fmdangky__tr">
                    <td>Confirm Password</td>
                    <td><input id="confirmpassword" type="password" placeholder="Confirm Password" name="xacnhanmatkhau" required/></td>
                    <td><span id="confirmpasswordError" class="warning-signup"></span> </td>
                </tr>
                <tr class="fmdangky__tr">
                    <td>Email</td>
                    <td><input id="email" type="text" placeholder="a@gmai.com" name="email"required></td>
                    <td><span id="emailError" class="warning-signup"></span> </td>
                </tr>
                <tr class="fmdangky__tr">
                    <td>Phone</td>
                    <td><input id="phone" type="text" placeholder="Phone number" name="dienthoai" value="" required/></td>
                    <td><span id="phoneError" class="warning-signup"></span> </td>
                </tr>
                <tr class="fmdangky__tr">
                    <td>Address</td>
                    <td><input id="address" type="text" placeholder="273 An Dương Vương " name="diachi" value="" required/></td>
                    <td><span id="addressError" class="warning-signup"></span> </td>
                </tr>
                <tr class="fmdangky__tr">
                    <td><button type="button" onclick="loginform()">Đã có tài khoản </button></td>
                    <td><button type="submit" id="dangky" name="dangky" value="Đăng ký">Đăng ký</button></td>
                </tr>
            </table>
        </div>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </form>
    <script src="../../assets/js/Validator.js"></script>
    <!-- <script>
        Validator({
            form: '#registrationForm',
            formGroupSelector: '.fmdangky__tr',
            errorSelector: '.warning-signup',
            rules: [
                Validator.isRequired('#username', 'Tên không được bỏ trống'),
                Validator.isRequired('#phone', 'Số điện thoại không được bỏ trống'),
                Validator.isSDT('#phone', 'Sai định dạng'),
                Validator.isRequired('#email', 'Email không được bỏ trống'),
                Validator.isEmail('#email'),
                Validator.isRequired('#password', 'Vui lòng nhập mật khẩu'),
                Validator.isRequired('#confirmpassword', 'Không được để trống vùng này'),
                Validator.isCheck('#confirmpassword', function() {
                    return document.querySelector('#registrationForm #password').value;
                }, 'Hai mật khẩu không giống nhau'),
            ],
            onSubmit: function(data) {
                console.log(data);
            }
        });
    </script> -->
</div>