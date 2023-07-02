<?php
$sql_sua_danhmucsp = "SELECT * FROM tbl_dangky WHERE id_dangky ='$_GET[id]' LIMIT 1";
$query_sua_danhmucsp = mysqli_query($mysqli, $sql_sua_danhmucsp);
?>

<div id="modal-editnv">
    <form method="POST" action="./modules/quanlynhanvien/xuly.php?id=<?php echo $_GET['id'] ?>">
        <div class="container">
            <table class="fmthemnv">
                <?php
                while ($dong = mysqli_fetch_array($query_sua_danhmucsp)) {
                ?>
                    <tr class="fmthemnv__tr">
                        <td>Mã nhân viên</td>
                        <td>
                            <input style="pointer-events: none;" id="ID" type="text" value="<?php echo $_GET['id'] ?>" name="IDnv" />
                        </td>
                    </tr>
                    <tr class="fmthemnv__tr">
                        <td>Tên nhân viên</td>
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
                            <input style="pointer-events: none;" id="Cv" type="text" placeholder="Chức vụ" name="vaitro" />
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Vui lòng chọn chức vụ
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item " href="#">Nhân viên</a></li>
                                    <li><a class="dropdown-item " href="#">Admin</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr class="fmthemnv__tr">
                        <td>Trạng thái tài khoản</td>
                        <td>
                            <input style="pointer-events: none;" id="status" type="text" placeholder="Trạng thái" name="status" />
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Vui lòng chọn trạng thái
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a id="hd" class="dropdown-item-hd" href="#">Hoạt động</a></li>
                                    <li><a id="hd" class="dropdown-item-hd" href="#">Khóa</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr class="fmthemnv__tr">
                        <td><button type="button" onclick="window.location.href = '?action=quanlynv&query=lietke';"
                        >Hủy sửa nhân viên </button></td>
                        <td><button type="submit" id="suanv" name="suanv">Sửa nhân viên</button></td>
                    </tr>

                <?php
                }
                ?>
            </table>
        </div>
    </form>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.dropdown-item').click(function(e) {
            e.preventDefault();
            var selectedValue = $(this).text();
            $('#Cv').val(selectedValue);
        });

        $('.dropdown-item-hd').click(function(e) {
            e.preventDefault();
            var selectedValue = $(this).text();
            $('#status').val(selectedValue);
        });
    });
</script>