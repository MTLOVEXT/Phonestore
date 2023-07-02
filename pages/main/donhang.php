<?php
	$id_khachhang = $_SESSION['id_khachhang'];
	$sql_lietke_dh = "SELECT * FROM tbl_cart,tbl_dangky WHERE tbl_cart.id_khachhang=tbl_dangky.id_dangky AND tbl_cart.id_khachhang='$id_khachhang' ORDER BY tbl_cart.id_cart DESC";
	$query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);
?>
<div class="order-modal">
    
    <div class="order-modal-top">
        <h3>Đơn hàng đã đặt</h3>
        <div class="order-modal-top-step"> <h3><a class="step" href="index.php?quanly=vanchuyen" >Phương thức vận chuyển</a></h3> </div>
        <div class="order-modal-top-step"> <h3><a class="step" href="index.php?quanly=thanhtoan" >Phương thức thanh toán</a><h3> </div>
    </div>

    <div class="order-modal-wapper">
        <div class="modal-cart-bottom">
            <div class="cart-table">
                <?php 
                    // if(isset($_SESSION['cart'])) {

                    // }
                ?>
                <table style="border-collapse: collapse;" border="1" class="cart-table-list">
                    <!-- <img src="../../assets/img/empty-cart.png" alt="Lỗi" class="emty-cart"> -->
                    <tr>
                        <th>STT</th>
                        <th>Mã đơn hàng</th>
                        <th>Tên khách hàng</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Tình trạng</th>
                        <th>Ngày đặt</th>
                        <th>In</th>
                        <th>Quản lý</th>
                        <th>Hình thức thanh toán</th>
                    </tr>

                    <?php 
                        if(isset($_SESSION['dangky'])){
                            $i = 0;
                            while($row = mysqli_fetch_array($query_lietke_dh)){
                                $i++;
                    ?>

                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $row['code_cart'] ?></td>
                        <td><?php echo $row['hovaten'] ?></td>
                        <td><?php echo $row['diachi'] ?></td>
                        <td><?php echo $row['dienthoai'] ?></td>
                        <td>
                        <?php 
                            if($row['cart_status']==0){
                                    echo '<a href="#">Đã tiếp nhận</a>';
                            }elseif($row['cart_status']==1){
                                    echo '<a href="#">Đang xử lý</a>';
                            }elseif($row['cart_status']==2){
                                echo '<a href="#">Đang vận chuyển</a>';
                            }elseif($row['cart_status']==3){
                                echo '<a href="#">Đã giao</a>';
                            }
                        ?>
                        </td>
                        <td><?php echo $row['cart_date'] ?></td>
                        <td>
                            <a href="./pages/main/indonhang.php?code=<?php echo $row['code_cart']?>&ten=<?php echo $row['tennv']?>&sdt=<?php echo $row['dienthoai']?>&diachi=<?php echo $row['diachi']?>">In Đơn hàng</a> 
                        </td>
                        <td>
                            <a href="index.php?quanly=xemdonhang&code=<?php echo $row['code_cart'] ?>">Xem đơn hàng</a> 
                        </td>
                        <td>
                            <a href="index.php?quanly=xemdonhang&code=<?php echo $row['code_cart'] ?>">Xem đơn hàng</a> 
                        </td>

                    </tr>

                    <?php 
                            }
                        }else {
                        // if($row['cart_status']==1){
                        //     // echo '<a href="modules/quanlydonhang/xuly.php?code='.$row['code_cart'].'">Đơn hàng mới</a>';
                        // }else{
                        //     // echo 'Đã xem';
                        // }
                    ?>

                    <tr>

                    <?php 
                        if(isset($_SESSION['dangnhap'])){ 
                    ?>
                        <td style="font-size: 2em;" colspan="10"><p>Hiện tại đơn hàng rỗng</p></td>
                    <?php 
                        }else {
                            echo '<td colspan="10"><p></p></td>';
                        }
                    ?>
                    </tr>

                    <?php
                        }
                    ?>
                </table>
                <div class="cart-table-check">
                    <?php 
                        if(isset($_SESSION['dangky'])){ 
                    ?>
                
                    <?php
                        } else {
                            echo '<p class= "cart-table-error">Vui lòng đăng nhập để xem đơn hàng</p>';
                    ?>
                    <a style="float: right;" href="#" onclick="document.getElementById('id01').style.display='block'" class="btn-modal-cart">
                        Đăng nhập
                    </a>
                    <?php 
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>

</div>