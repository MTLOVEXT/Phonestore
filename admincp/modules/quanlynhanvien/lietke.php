<?php
$sql_lietke_dh = "SELECT * FROM tbl_dangky WHERE tbl_dangky.vaitro != 2 ORDER BY tbl_dangky.id_dangky DESC";
$query_lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);
$count = mysqli_num_rows($query_lietke_dh);
// if($count>0) {
//     $row_data = mysqli_fetch_array($query_lietke_dh);
//     $_SESSION['vaitro'] = $row_data['vaitro'];
//     $_SESSION['user'] = $row_data['tennv'];
//     $check = $_SESSION['vaitro'];
//     $user = $_SESSION['user'];
//     echo "<p>$user</p>";
// }
// if($check == 0) {
//     echo '<p style="color:black;font-size:1em;">Danh sách nhân viên</p>'
?>
<table style="width:100%" border="1" style="border-collapse: collapse;">
  <tr>
    <th>Id</th>
    <th>Tên nhân viên</th>
    <th>Email</th>
    <th>Số điện thoại</th>
    <th>Địa chỉ</th>
    <th>Vai trò</th>
    <th>Trạng thái</th>
    <th>Quản lý</th>

  </tr>
  <?php
  $i = 0;
  while ($row = mysqli_fetch_array($query_lietke_dh)) {
    $i++;
  ?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $row['tennv'] ?></td>
      <td><?php echo $row['email'] ?></td>
      <td><?php echo $row['dienthoai'] ?></td>
      <td><?php echo $row['diachi'] ?></td>
      <td>
        <?php 
            if($row['vaitro'] == 1) {
                echo 'Nhân viên';
            }elseif($row['vaitro'] == 0) {
                echo 'Admin';
            }
        ?>
      </td>
      <td>
        <?php 
            if($row['trangthai'] == 1) {
                echo 'Hoạt động';
            }elseif($row['trangthai'] == 0) {
                echo 'Khóa';
            }
        ?>
      </td>
      <td>
        <a href="modules/quanlynhanvien/xuly.php?idnv=<?php echo $row['id_dangky'] ?>">Xóa</a>| <a href="
        ?action=quanlynhanvien&query=sua&id=<?php echo $row['id_dangky'] ?>">Sửa</a> 
      </td>

    </tr>
  <?php
  }
  ?>

</table>

<p><a href="#" onclick="document.getElementById('modal-nv').style.display='block'">Thêm nhân viên</a></p>

<?php 
// } elseif($check == 1) {
//     echo '<p style="color:black;font-size:2em;">Nhân viên không có quyền xem danh sách</p>';
// }else {
//     echo '<p style="color:black;font-size:2em;">Không đăng nhập không xem được danh sách nhân viên</p>';
// }
?>

<div id="modal-nv" class="modal-nv">
    <form method="POST" action="./modules/quanlynhanvien/xuly.php">
        <div class="imgcontainer">
            <span onclick="document.getElementById('modal-nv').style.display='none'" class="close" title="Close Modal">&times;</span>
            <!-- <img src="../../assets/" alt="Avatar" class="avatar"> -->
        </div>
        <div class="container">
            <table class="fmthemnv">
                <tr class="fmthemnv__tr">
                    <td>Mã nhân viên</td>
                    <td>
                        <input style="pointer-events: none;" id="ID" type="text" value="<?php echo $code_order = rand(0,9999) ?>" name="ID" />
                    </td>
                </tr>
                <tr class="fmthemnv__tr">
                    <td>Tên nhân viên</td>
                    <td><input id="tennv" type="text" placeholder="Nguyễn Văn A" name="hovaten" /></td>
                </tr>
                <tr class="fmthemnv__tr">
                    <td>Tài khoản đăng nhập</td>
                    <td><input id="username" type="text" placeholder="Username" name="username" /></td>
                </tr>
                <tr class="fmthemnv__tr">
                    <td>Mật khẩu đăng nhập</td>
                    <td><input id="password" type="password" placeholder="password" name="matkhau" /></td>
                </tr>
                <tr class="fmthemnv__tr">
                    <td>Email</td>
                    <td><input id="email" type="text" placeholder="a@gmai.com" name="email"></td>
                </tr>
                <tr class="fmthemnv__tr">
                    <td>Số điện thoại</td>
                    <td><input id="phone" type="text" placeholder="Phone number" name="dienthoai"/></td>
                </tr>
                <tr class="fmthemnv__tr">
                    <td>Địa chỉ</td>
                    <td><input id="address" type="text" placeholder="273 An Dương Vương " name="diachi" /></td>
                </tr>
                <tr class="fmthemnv__tr">
                    <td><button type="button" onclick="document.getElementById('modal-nv').style.display='none'">Hủy thêm nhân viên </button></td>
                    <td><button type="submit" id="themnv" name="themnv" value="Đăng ký">Thêm nhân viên</button></td>
                </tr>
            </table>
        </div>
    </form>
</div>
