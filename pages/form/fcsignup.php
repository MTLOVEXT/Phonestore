<?php
	if(isset($_POST['doimatkhau'])){
		$taikhoan = $_POST['usernamCPass'];
		$matkhau_cu = md5($_POST['Password']);
		$matkhau_moi = md5($_POST['cPassword']);
        $sql = "SELECT * FROM tbl_dangky WHERE hovaten='".$taikhoan."' AND matkhau='".$matkhau_cu."' LIMIT 1";
        $row = mysqli_query($mysqli,$sql);
        $count = mysqli_num_rows($row);
        if($count>0){
            $row_data = mysqli_fetch_array($row);
            $_SESSION['dangky'] = $row_data['hovaten'];
            if($_SESSION['dangky']==$taikhoan) {
                $sql_update = mysqli_query($mysqli,"UPDATE tbl_dangky SET matkhau='".$matkhau_moi."'");
                echo '<script>alert("Bạn đã đổi mật khẩu thành công");</script>';
            }else {
                echo '<script>alert("Không tồn tại tài khoản");</script>';
            }
        }else{
            echo '<script>alert("Đổi mật khẩu không thành công");</script>';
        }
	} 
?>

<div id="modal-change" class="modal-changepass">
    <form class="modal-content animate" method="POST">
        <div class="imgcontainer">
            <span onclick="document.getElementById('modal-change').style.display='none'" class="close" title="Close Modal">&times;</span>
            <img src="./assets/img/user.jpg" alt="Avatar" class="avatar">
        </div>

        <div class="container">
            <form autocomplete="off" action="">
                <label for="Password"><b>Username</b></label>
                <input type="text" autocomplete="off" name="usernamCPass" placeholder="Enter Username" required>
                <label for="Password"><b>Password</b></label>
                <br />
                <input style="width:89%;" id="cPassword" type="Password" placeholder="Enter Password" name="Password" required>
                <button style="width: 10%;" type="button" id="btnCpass"><i id="current-iconpass" class="far fa-eye"></i></button>
                <div id="message" class="error-messageps"></div>
                <label for="cPassword"><b>New Password</b></label>
                <br />
                <input style="width:89%;" id="conPassword" type="Password" placeholder="Enter Confirm Password" name="cPassword" required>
                <button style="width: 10%;" type="button" id="conbtnCpass"><i id="current-iconcpass" class="far fa-eye"></i></button>
                <div id="message" class="error-messageps"></div>
                <button type="submit" name="doimatkhau">Change Password</button>
            </form>
        </div>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </form>
</div>