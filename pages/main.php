<div id="main">
    <?php
    include("./pages/form/floginkh.php");
    ?>

    <div class="div-content">
        <?php
        include("./pages/content/content1.php")
        ?>
        <div class="content2" id="noidung">
            <?php
            if (isset($_GET['quanly'])) {
                $tam = $_GET['quanly'];
            } else {
                $tam = '';
            }
            if ($tam == 'danhmucsanpham') {
                include("./pages/main/danhmuc.php");
            } elseif ($tam == 'sanpham') {
                include("./pages/main/sanpham.php");
            } elseif ($tam == 'thongtin') {
                include("./pages/main/thongtin.php");
            } elseif ($tam == 'giohang') {
                include("./pages/main/giohang.php");
            } elseif ($tam == 'danhmuc') {
                include("./pages/main/danhmuc.php");
            } elseif ($tam == 'donhang') {
                include("./pages/main/donhang.php");
            } elseif ($tam == 'hotro') {
                include("./pages/main/hotro.php");
            } elseif ($tam == 'timkiem') {
                include("./pages/main/timkiem.php");
            } elseif($tam=='thanhtoan'){
                include("./pages/main/thanhtoan.php");
            } elseif ($tam == 'camon') {
                include("./pages/main/camon.php");
            } elseif($tam=='xemdonhang'){
                include("./pages/main/xemdonhang.php");
            }elseif($tam=='vanchuyen'){
                include("./pages/main/vanchuyen.php");
            }elseif($tam=='thongtinthanhtoan'){
                include("./pages/main/thongtinthanhtoan.php");
            } else {
                include("./pages/main/index.php");
            }
            ?>
        </div>

    </div>
</div>