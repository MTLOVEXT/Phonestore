<div id="modal-cart" class="modal-cart">
    <!-- <span onclick="document.getElementById('modal-cart').style.display='none'" class="close" title="Close Modal">&times;</span> -->

    <?php
        if(isset($_SESSION['id_khachhang'])){
    ?>

    <div style="pointer-events: none;" class="container">
        <!-- Responsive Arrow Progress Bar -->
        <div class="arrow-steps clearfix">
            <div class="step done"> <span> <a href="index.php?quanly=giohang">Giỏ hàng</a></span> </div>
            <div class="step current"> <span><a href="index.php?quanly=vanchuyen">Vận chuyển</a></span> </div>
            <div class="step"> <span><a href="index.php?quanly=thongtinthanhtoan">Thanh toán</a><span> </div>
        </div>

    <?php
        }
    ?>

    </div>
    <div class="modal-wrapper">
        <div class="modal-cart-bottom">
            <div class="cart-table">
                <?php
                if (isset($_SESSION['cart'])) {
                }
                ?>
            </div>

            <h4>Thông tin vận chuyển</h4>
            <?php
            if (isset($_POST['themvanchuyen'])) {
                $name = $_POST['name'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $note = $_POST['note'];
                $id_dangky = $_SESSION['id_khachhang'];
                $sql_them_vanchuyen = mysqli_query($mysqli, "INSERT INTO tbl_shipping(name,phone,address,note,id_dangky) VALUES('$name','$phone','$address','$note','$id_dangky')");
                if ($sql_them_vanchuyen) {
                    echo '<script>alert("Thêm vận chuyển thành công")</script>';
                }
            } elseif (isset($_POST['capnhatvanchuyen'])) {
                $name = $_POST['name'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $note = $_POST['note'];
                $id_dangky = $_SESSION['id_khachhang'];
                $sql_update_vanchuyen = mysqli_query($mysqli, "UPDATE tbl_shipping SET name='$name',phone='$phone',address='$address',note='$note',id_dangky='$id_dangky' WHERE id_dangky='$id_dangky'");
                if ($sql_update_vanchuyen) {
                    echo '<script>alert("Cập nhật vận chuyển thành công")</script>';
                }else {
                    echo '<script>alert("Cập nhật vận chuyển thất bại")</script>';
                }
            }
            ?>
            <div class="row">
                <?php
                $id_dangky = $_SESSION['id_khachhang'];
                $sql_get_vanchuyen = mysqli_query($mysqli, "SELECT * FROM tbl_shipping WHERE id_dangky='$id_dangky' LIMIT 1");
                $count = mysqli_num_rows($sql_get_vanchuyen);
                if ($count > 0) {
                    $row_get_vanchuyen = mysqli_fetch_array($sql_get_vanchuyen);
                    $name = $row_get_vanchuyen['name'];
                    $phone = $row_get_vanchuyen['phone'];
                    $address = $row_get_vanchuyen['address'];
                    $note = $row_get_vanchuyen['note'];
                } else {

                    $name = '';
                    $phone = '';
                    $address = '';
                    $note = '';
                }
                ?>
                <div class="col-md-12">
                    <form action="" autocomplete="off" method="POST">
                        <div class="form-group">
                            <label for="email">Họ và tên</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name ?>" placeholder="...">
                        </div>
                        <div class="form-group">
                            <label for="email">Phone</label>
                            <input type="text" name="phone" class="form-control" value="<?php echo $phone ?>" placeholder="...">
                        </div>
                        <div class="form-group">
                            <label for="email">Địa chỉ</label>
                            <input type="text" name="address" class="form-control" value="<?php echo $address ?>" placeholder="...">
                        </div>
                        <div class="form-group">
                            <label for="email">Ghi chú</label>
                            <input type="text" name="note" class="form-control" value="<?php echo $note ?>" placeholder="...">
                        </div>
                        <?php
                        if ($name == '' && $phone == '') {
                        ?>
                            <button type="submit" name="themvanchuyen" class="btn btn-primary">Thêm vận chuyển</button>
                            <a href="index.php?quanly=thongtinthanhtoan" class="btn-next" >Tiếp tục</a>
                            <a href="index.php?quanly=giohang" class="btn-next" >Quay về giỏ hàng</a>
                        <?php
                        } elseif ($name != '' && $phone != '') {
                        ?>
                            <button type="submit" name="capnhatvanchuyen" class="btn btn-success">Cập nhật vận chuyển</button>
                            <a href="index.php?quanly=thongtinthanhtoan" class="btn-next" >Tiếp tục</a>
                            <a href="index.php?quanly=giohang" class="btn-next" >Quay về giỏ hàng</a>
                        <?php
                        }
                        ?>
                    </form>
                </div>
            </div>



        </div>
    </div>