<?php
$sql_danhmucsp = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
$query_danhmucsp = mysqli_query($mysqli, $sql_danhmucsp);
?>

<?php
    if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
        unset($_SESSION['dangky']);
    } 
?>

<div id="Header">    
    <nav id="nav-bar" class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a id="nav-link-home" class="nav-link active" aria-current="page" href="index.php"><i class="fa-solid fa-house"></i> Trang chủ</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Danh mục sản phẩm
                        </a>
                        <ul class="dropdown-menu">
                            <?php
                                while($row_danhmuc = mysqli_fetch_array($query_danhmucsp)) {
                            ?>
                            <li><a class="dropdown-item" href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc']?>"><?php echo $row_danhmuc['tendanhmuc']?></a></li>
                            
                            <!-- <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                            
                            <?php
                                }
                            ?>
                            
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php?quanly=thongtin"><i class="ti-info"></i> Thông tin liên hệ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?quanly=hotro"><i class="ti-comment-alt"></i> Hỗ trợ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?quanly=donhang"><i class="ti-clipboard"></i> Tra cứu đơn hàng </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?quanly=giohang"><i class="ti-shopping-cart"></i> Giỏ hàng </a>
                    </li>
                    <li class="nav-item">
                    <?php
                        if(!isset($_SESSION['dangky'])){
                            // echo $_SESSION['id_khachhang'];
                    ?>
                        <a class="nav-link active" onclick="document.getElementById('id01').style.display='block'"><i class="ti-user"></i> Đăng nhập </a>
                    </li>
                    <?php 
                        }else {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?dangxuat=1"><i class="fa-solid fa-arrow-right-from-bracket"></i><?php echo $_SESSION['dangky']; ?> </a>
                    </li>
                    
                    <?php
                        }
                    ?>

                </ul>
                <form action="index.php?quanly=timkiem" method="POST" class="d-flex" >
                    <input class="form-control me-2" type="text" name="tukhoa" placeholder="Tìm sản phẩm ..." aria-label="Search">
                    <button class="btn btn-outline-success" type="submit" name="timkiem" >Search</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- <div class="nav-menu"><i class="fas fa-bars"></i></div> -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</div>
