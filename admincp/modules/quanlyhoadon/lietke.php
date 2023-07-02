<p>Liệt kê đơn hàng</p>
<?php
$sql_lietke_dh = "SELECT * FROM tbl_cart,tbl_dangky WHERE tbl_cart.id_khachhang=tbl_dangky.id_dangky ORDER BY tbl_cart.id_cart DESC";
$query_lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);
$count = mysqli_num_rows($query_lietke_dh);
// if ($count > 0) {
//   $row_data = mysqli_fetch_array($query_lietke_dh);
//   $_SESSION['code_cart'] = $row_data['code_cart'];
//   $_SESSION['cartstatus'] = $row_data['cart_status'];

// }
?>
<table style="width:100%" border="1" style="border-collapse: collapse;">
  <tr>
    <th>ID</th>
    <th>Mã đơn hàng</th>
    <th>Tên khách hàng</th>
    <th>Địa chỉ</th>
    <th>Email</th>
    <th>Số điện thoại</th>
    <th>Tình trạng</th>
    <th>Ngày đặt</th>
    <th>Chi tiết</th>
    <th>In</th>

  </tr>
  <?php
  $i = 0;
  $show = 1;
  while ($row = mysqli_fetch_array($query_lietke_dh)) {
    $i++;
  ?>
    <tr>
      <td>
        <?php echo $row['id_cart'] ?>
      </td>
      <td>
        <?php echo $row['code_cart'] ?>
      </td>
      <td>
        <?php echo $row['hovaten'] ?>
      </td>
      <td>
        <?php echo $row['diachi'] ?>
      </td>
      <td>
        <?php echo $row['email'] ?>
      </td>
      <td>
        <?php echo $row['dienthoai'] ?>
      </td>
      <td>
        <div class="dropdown">
          <?php
          // Kiểm tra xem form đã được gửi đi hay chưa
          if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy giá trị từ input có tên là 'cartStatus'
            $cartStatus = $_POST['cart_status'];

            // Gán giá trị cho $row['cart_status']
            $row['cart_status'] = $cartStatus;
            if ($row['cart_status'] == 'Đã tiếp nhận') {
              $row['cart_status'] = 0;
            } elseif ($row['cart_status'] == 'Đang xử lý') {
              $row['cart_status'] = 1;
            } elseif ($row['cart_status'] == 'Đang vận chuyển') {
              $row['cart_status'] = 2;
            } elseif ($row['cart_status'] == 'Đã giao') {
              $row['cart_status'] = 3;
            }
          }
          ?>
          <form action="" method="POST">
            <input style="pointer-events: none;text-align: center;" id="status" type="text" value="
              <?php
              if ($row['cart_status'] == 0) {
                echo 'Đã tiếp nhận';
              } elseif ($row['cart_status'] == 1) {
                echo 'Đang xử lý';
              } elseif ($row['cart_status'] == 2) {
                echo 'Đang vận chuyển';
              } elseif ($row['cart_status'] == 3) {
                echo 'Đã giao';
              }
              ?>
              " name="cart_status" />
            <div class="dropdown">
              <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Chọn Trạng thái
              </a>

              <input type="submit" onclick="" value="Lưu">
              <a id="submitBtn" class="btnstatus" href="modules/quanlyhoadon/xuly.php?idhd=<?php echo $row['code_cart'] ?>&show=<?php echo $show?>&status=<?php echo $row['cart_status'] ?>&id=<?php echo $row['id_cart'] ?>&iduser=<?php echo $row['id_khachhang'] ?>&date=<?php echo $row['cart_date'] ?>">Sửa</a>

              <ul class="dropdown-menu">
                <li><button onclick="setButtonValue(this)" class="dropdown-item" name="trangthai" value="0">Đã tiếp nhận</button></li>
                <li><button onclick="setButtonValue(this)" class="dropdown-item" name="trangthai" value="1">Đang xử lý</button></li>
                <li><button onclick="setButtonValue(this)" class="dropdown-item" name="trangthai" value="2">Đang vận chuyển</button></li>
                <li><button onclick="setButtonValue(this)" class="dropdown-item" name="trangthai" value="3">Đã giao</button></li>
              </ul>
            </div>
          </form>
        </div>
      </td>
      <td>
        <?php echo $row['cart_date'] ?>
      </td>
      <td>
        <a href="index.php?action=donhang&query=xemdonhang&code=<?php echo $row['code_cart'] ?>&cart_status=<?php echo $row['cart_status'] ?>">Xem
          chi tiết </a>
      </td>
      <td>
        <a href="modules/quanlyhoadon/indonhang.php?code=<?php echo $row['code_cart'] ?>">In Đơn hàng</a>
      </td>

    </tr>
  <?php
  }
  ?>
</table>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $('.dropdown-item').click(function(e) {
      e.preventDefault();
      var selectedValue = $(this).text();
      $('#status').val(selectedValue);
    });
  });

  function setButtonValue(button) {
    var inputValue = button.value;
    // console.log(document.getElementById('status').value )
    document.getElementById('status').value = inputValue;
    console.log(document.getElementById('status').value)
  }

  function setValueInput() {
    // console.log(document.getElementById('status').value )
    document.getElementById('status').value = "";
  }
</script>