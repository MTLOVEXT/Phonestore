<?php
	$code = $_GET['code'];
	$sql_lietke_dh = "SELECT * FROM tbl_cart_details,tbl_sanpham,tbl_cart WHERE tbl_cart.code_cart=tbl_cart_details.code_cart and tbl_cart_details.id_sanpham=tbl_sanpham.id_sanpham AND tbl_cart_details.code_cart='".$code."' ORDER BY tbl_cart_details.id_cart_details DESC";
	$query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);
?>
<div class="view-order-modal">
    <h3>Thông tin đơn hàng : 
        <?php
            // if(isset($_SESSION['cart'])){
            //     echo $_SESSION['code_cart'];
            // } 
        ?>
    </h3>
    <div class="modal-cart-bottom">
        <div class="cart-table">
            <?php 
                // if(isset($_SESSION['cart'])) {

                // }
            ?>
            <table style="border-collapse: collapse;" border="1" class="cart-table-list">
                <!-- <img src="../../assets/img/empty-cart.png" alt="Lỗi" class="emty-cart"> -->
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Ngày đặt</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                </tr>

                <?php 
                    $i = 0;
                    $tongtien = 0;
                    while($row = mysqli_fetch_array($query_lietke_dh)){
                        $i++;
                        $thanhtien = $row['giasp']*$row['soluongmua'];
                        $tongtien += $thanhtien ;
                ?>

                <tr>
                    <td><?php echo $row['code_cart'] ?></td>
                    <td><?php echo $row['tensanpham'] ?></td>
                    <td><?php echo $row['soluongmua'] ?></td>
                    <td><?php echo $row['cart_date'] ?></td>
                    <td><?php echo number_format($row['giasp'],0,',','.').'vnđ' ?></td>
                    <td><?php echo number_format($thanhtien,0,',','.').'vnđ' ?></td>
                </tr>
                <?php
                    } 
                ?>
                <tr>
                    <td style="font-size: 2em;" colspan="6">
                    <p>Tổng tiền : <?php echo number_format($tongtien,0,',','.').'vnđ' ?></p>
                    </td>
                </tr>

                
            </table>
        </div>
        <div class="cart-button">
            <a href="./index.php" class="btn-modal-cart">
                Tiếp tục mua hàng
            </a>
        </div>
    </div>
</div>
