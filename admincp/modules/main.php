<div class="clear"></div>
<div class="main">
    <?php
        if(isset($_GET['action']) && isset($_GET['query'])){
            $tam = $_GET['action'];
            $query = $_GET['query'];
        }else{
            $tam = '';
            $query = '';
        }
        if($tam == 'quanlydanhmucsp' && $query == 'them'){
            include("./modules/quanlydanhmucsp/them.php");
            include("./modules/quanlydanhmucsp/lietke.php");

        }elseif($tam == 'quanlydanhmucsp' && $query == 'sua'){
            include("./modules/quanlydanhmucsp/sua.php");

        }elseif($tam == 'quanlysp' && $query=='them'){
            include("./modules/quanlysp/them.php");
            include("./modules/quanlysp/lietke.php");

        }elseif($tam=='quanlysp' && $query=='sua'){
            include("modules/quanlysp/sua.php");

        }elseif($tam=='quanlydonhang' && $query=='lietke'){
            include("./modules/quanlyhoadon/lietke.php");
        }elseif($tam=='quanlydonhang' && $query=='xuly'){
            include("./modules/quanlyhoadon/xuly.php");
        }elseif($tam=='donhang' && $query=='xemdonhang'){
            include("./modules/quanlyhoadon/xemdonhang.php");
        }elseif($tam=='quanlynv' && $query=='lietke'){
            include("./modules/quanlynhanvien/lietke.php");
        }elseif($tam=='quanlynv' && $query=='xuly'){
            include("./modules/quanlynhanvien/xuly.php");
        }elseif($tam=='quanlynhanvien' && $query=='sua'){
            include("./modules/quanlynhanvien/sua.php");

        }elseif($tam=='quanlyuser' && $query=='lietke'){
            include("./modules/quanlyuser/lietke.php");
        }elseif($tam=='quanlyuser' && $query=='xuly'){
            include("./modules/quanlyuser/xuly.php");
        }elseif($tam=='quanlyuser' && $query=='sua'){
            include("./modules/quanlyuser/sua.php");

        }else{
            include("./modules/dashboard.php");
        }
        
        
    ?>
</div>
