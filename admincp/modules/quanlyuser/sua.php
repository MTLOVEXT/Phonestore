<?php
$sql_sua_danhmucsp = "SELECT * FROM tbl_dangky WHERE id_dangky ='$_GET[id]' LIMIT 1";
$query_sua_danhmucsp = mysqli_query($mysqli, $sql_sua_danhmucsp);
?>

<div id="modal-editnv">
    <form method="POST" action="./modules/quanlyuser/xuly.php?id=<?php echo $_GET['id'] ?>">
        <div class="container">
            <table class="fmthemnv">
                <?php
                while ($dong = mysqli_fetch_array($query_sua_danhmucsp)) {
                ?>
                    <tr class="fmthemnv__tr">
                        <td>Mã khách hàng</td>
                        <td>
                            <input style="pointer-events: none;" id="ID" type="text" value="<?php echo $_GET['id'] ?>" name="IDnv" />
                        </td>
                    </tr>
                    <tr class="fmthemnv__tr">
                        <td>Tên khách hàng</td>
                        <td><input id="tennv" type="text" placeholder="Nguyễn Văn A" name="hovatennv" required/></td>
                    </tr>
                    <tr class="fmthemnv__tr">
                        <td>Tài khoản đăng nhập</td>
                        <td><input id="username" type="text" placeholder="Username" name="usernamenv" required/></td>
                    </tr>
                    <tr class="fmthemnv__tr">
                        <td>Mật khẩu đăng nhập</td>
                        <td><input id="password" type="password" placeholder="password" name="matkhaunv" required/></td>
                    </tr>
                    <tr class="fmthemnv__tr">
                        <td>Email</td>
                        <td><input id="email" type="text" placeholder="a@gmai.com" name="emailnv" required></td>
                    </tr>
                    <tr class="fmthemnv__tr">
                        <td>Số điện thoại</td>
                        <td><input id="phone" type="text" placeholder="Phone number" name="dienthoainv" required/></td>
                    </tr>
                    <tr class="fmthemnv__tr">
                        <td>Địa chỉ</td>
                        <td><input id="address" type="text" placeholder="273 An Dương Vương " name="diachinv" required/></td>
                    </tr>
                    <tr class="fmthemnv__tr">
                        <td>Vai trò</td>
                        <td>
                            <input style="pointer-events: none;" type="text" placeholder="Khách hàng" name="vaitro"/>
                        </td>
                    </tr>
                    <tr class="fmthemnv__tr">
                        <td><button type="button" onclick="window.location.href = '?action=quanlyuser&query=lietke';"
                        >Hủy sửa khách hàng </button></td>
                        <td><button type="submit" id="suakh" name="suakh">Sửa khách hàng</button></td>
                    </tr>

                <?php
                }
                ?>
            </table>
        </div>
    </form>
</div>