<div class="clear"></div>
<div class="main">
    <?php
        if(isset($_GET['action'])){
            $tam = $_GET['action'];
        }else{
            $tam = '';
        }
        if($tam == 'quanlydanhmucsp'){
            include("./modules/quanlysp/them.php");
        }elseif($tam == 'quanlysp'){
            include("./pages/main/danhmuc.php");
        }elseif($tam == 'quanlynv'){
            include("./pages/main/giohang.php");
        }elseif($tam == 'quanlyhoadon'){
            include("./pages/main/danhmuc.php");
        }elseif($tam == 'quanlytintuc'){
            include("./pages/main/donhang.php");
        }else{
            include("./modules/dashboard.php");
        }
        
        
    ?>
</div>