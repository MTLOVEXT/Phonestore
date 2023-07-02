<div id="modal-cart" class="modal-cart">
    <!-- <span onclick="document.getElementById('modal-cart').style.display='none'" class="close" title="Close Modal">&times;</span> -->
    <div class="modal-cart-top">
        <h3>
            Xin chào
            <?php
            if (isset($_SESSION['dangky'])) {
                echo '<span style="color:red">' . $_SESSION['dangky'] . '</span>' . ' Giỏ hàng của bạn';
            }
            ?>
        </h3>
    </div>
    <div class="modal-wrapper">
        <div class="modal-cart-bottom">
            <div class="cart-table">
                <?php
                if (isset($_SESSION['cart'])) {
                }
                ?>

                <div style="pointer-events: none;" class="container">
                    <!-- Responsive Arrow Progress Bar -->
                    <div class="arrow-steps clearfix">
                        <div class="step current"> <span> <a href="index.php?quanly=giohang">Giỏ hàng</a></span> </div>
                        <div class="step"> <span><a href="index.php?quanly=vanchuyen">Vận chuyển</a></span> </div>
                        <div class="step"> <span><a href="index.php?quanly=thongtinthanhtoan">Thanh toán</a><span> </div>
                    </div>

                </div>

                <table class="cart-table-list">
                    <!-- <img src="../../assets/img/empty-cart.png" alt="Lỗi" class="emty-cart"> -->
                    <tr>
                        <th>Thứ tự</th>
                        <th>Tên sản phẩm</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th></th>
                    </tr>

                    <?php
                    if (isset($_SESSION['cart'])) {
                        $i = 0;
                        $thanhtien = 0;
                        $tongtien = 0;
                        $sl = 0;
                        foreach ($_SESSION['cart'] as $cart_item) {
                            $i++;
                            $thanhtien = $cart_item['giasp'] * $cart_item['soluong'];
                            $tongtien = $tongtien + $thanhtien;
                            $sl += $cart_item['soluong'];
                    ?>

                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $cart_item['tensanpham'] ?></td>
                                <td><img src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh'] ?>" width="150px" alt="Lỗi"></td>
                                <td><?php echo number_format($cart_item['giasp'], 0, ',', '.') . 'VNĐ' ?></td>
                                <td>
                                    <a href="pages/main/themgiohang.php?cong=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-plus"></i></a>
                                    <?php echo $cart_item['soluong'] ?>
                                    <a href="pages/main/themgiohang.php?tru=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-minus"></i></a>
                                </td>
                                <td><?php echo number_format($thanhtien, 0, ',', '.') . 'VNĐ' ?></td>
                                <td><a href="pages/main/themgiohang.php?xoa=<?php echo $cart_item['id'] ?>" class="cart-table-list_a">Xóa</a></td>
                            </tr>

                        <?php
                        }
                    } else {
                        $sl = 0;
                        $thanhtien = 0;
                        $tongtien = 0;
                        ?>

                        <tr>
                            <?php
                            if (isset($_SESSION['dangnhap'])) {
                            ?>
                                <td style="font-size: 2em;" colspan="7">
                                    <p>Hiện tại giỏ hàng rỗng</p>
                                </td>
                            <?php
                            }
                            ?>
                        </tr>

                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>

        <div class="sum-total">
            <h3 class="sum-total-h3">Giỏ hàng của bạn có <?php echo $sl ?> sản phẩm</h3>
            <div class="sum-total-detail">
                <p>Tổng tiền thanh toán: </p>
                <h3 id="number-total"><?php echo number_format($tongtien, 0, ',', '.') . 'VNĐ' ?></h3>
            </div>

            <?php
            if (isset($_SESSION['cart'])) {
            ?>
                <div class="sum-total-delall">
                    <a href="pages/main/themgiohang.php?xoatatca=1">Xóa tất cả</a>
                </div>
            <?php
            }
            ?>

        </div>

        <div class="cart-button">
            <?php
            if (isset($_SESSION['dangky']) && isset($_SESSION['cart'])) {
            ?>
                <a href="index.php?quanly=vanchuyen" class="btn-modal-cart">
                    Tiếp tục
                </a>

                <a href="./index.php" class="btn-modal-cart">
                    Tiếp tục mua hàng
                </a>
            <?php
            } elseif (isset($_SESSION['dangky']) && !isset($_SESSION['cart'])) {
                echo '<p style="color:red;">Vui lòng mua hàng trước khi thanh toán</p>';
            ?>
                <a href="./index.php" class="btn-modal-cart">
                    Tiếp tục mua hàng
                </a>
            <?php
            } else {
                echo '<p style="color:red;">Vui lòng đăng nhập trước khi mua hàng</p>';
            ?>
                <a href="#" onclick="document.getElementById('id01').style.display='block'" class="btn-modal-cart">
                    Đăng nhập
                </a>
            <?php
            }
            ?>
        </div>

    </div>
</div>