<?php
    $sql_danhmucsp = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
    $query_danhmucsp = mysqli_query($mysqli,$sql_danhmucsp);
?>
<div id="Header">
    <div class="logo">
        <a href="index.php"><img class="logo-img" src="./assets/img/logo-no-background.png" alt="Logo"></a>
    </div>            
    <nav id="nav">
        <li><a href="index.php?quanly=thongtin" class="active"><i class="ti-info"></i> Thông tin liên hệ</a></li>
        <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="index.php?quanly=danhmucsanpham&id=1" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                <i class="ti-menu-alt"></i>
                Danh mục
                <i class="nav-arrow-down ti-angle-down"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                
                <a class="dropdown-item" href="index.php?quanly=danhmucsanpham&id=</a>
                
            </div>
        </li> -->
        <?php 
            while($row_danhmuc = mysqli_fetch_array($query_danhmucsp)){
        ?>
        <li><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc']?>"><?php echo $row_danhmuc['tendanhmuc'] ?></a></li>
        <?php
            } 
        ?>
        <li><a href="index.php?quanly=donhang"><i class="ti-clipboard"></i> Tra cứu đơn hàng</a></li>
        <li><a href="index.php?quanly=giohang"><i class="ti-shopping-cart"></i> Giỏ hàng</a></li>
        <li><a href="index.php?quanly=hotro"><i class="ti-comment-alt"></i> Hỗ trợ</a></li>
        <li><a href="#"onclick="document.getElementById('id01').style.display='block'"><i class="ti-user"></i> Đăng nhập </a></li>
        <li>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </li>
    </nav>
    <div class="nav-menu"><i class="fas fa-bars"></i></div>
    <div class="search-btn">
        <input id="search-txt" type="text">
        <i id="search" class="search-icon ti-search"></i>
    </div>
</div>