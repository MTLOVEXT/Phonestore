<div id="main">
    <?php
        include("./pages/form/flogin.php")
      ?>

    <div class="div-content">
        <?php
            include("./pages/content/content1.php")
        ?>
        <div class="content2" id="noidung">
            <?php
                if(isset($_GET['quanly'])){
                    $tam = $_GET['quanly'];
                }else{
                    $tam = '';
                }
                if($tam == 'danhmucsanpham'){
                    include("./pages/main/danhmuc.php");
                }elseif($tam == 'sanpham'){
                    include("./pages/main/sanpham.php");
                }elseif($tam == 'thongtin'){
                    include("./pages/main/thongtin.php");
                }elseif($tam == 'giohang'){
                    include("./pages/main/giohang.php");
                }elseif($tam == 'danhmuc'){
                    include("./pages/main/danhmuc.php");
                }elseif($tam == 'donhang'){
                    include("./pages/main/donhang.php");
                }elseif($tam == 'hotro'){
                    include("./pages/main/hotro.php");
                }else{
                    include("./pages/main/index.php");
                }
            ?>
        </div>

    </div>
</div>