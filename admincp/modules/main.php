<div class="clear"></div>
<div class="main">
    <?php
        if(isset($_GET['action']) && $_GET['query']){
            $tam = $_GET['action'];
            $query = $_GET['query'];
        }else{
            $tam = '';
            $_query = '';
        }
        if($tam == 'quanlydanhmucsp' && $query == 'them'){
            include("./modules/quanlysp/them.php");
            include("./modules/quanlysp/lietke.php");
        }elseif($tam == 'quanlydanhmucsp' && $query == 'sua'){
            include("./modules/quanlysp/sua.php");
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