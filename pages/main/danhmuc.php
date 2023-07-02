<?php
    if(isset($_GET['trangdanhmuc'])){
        $page = $_GET['trangdanhmuc'];
    }else{
        $page = 1;
    }
    if($page == '' || $page == 1){
        $begin = 0;
    }else{
        $begin = ($page*3)-3;
    }
	// $sql_pro = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_danhmuc='$_GET[id]' ORDER BY id_sanpham DESC LIMIT $begin,3";
	$sql_pro = "SELECT sp.*  FROM tbl_sanpham sp, tbl_danhmuc dm WHERE sp.id_danhmuc = dm.id_danhmuc AND sp.id_danhmuc = '$_GET[id]' ORDER BY sp.id_sanpham DESC LIMIT $begin,3";
    $query_pro = mysqli_query($mysqli,$sql_pro);
	//get ten danh muc
	$sql_cate = "SELECT * FROM tbl_danhmuc WHERE tbl_danhmuc.id_danhmuc='$_GET[id]' LIMIT 1";
	$query_cate = mysqli_query($mysqli,$sql_cate);
	$row_title = mysqli_fetch_array($query_cate);
?>
<p style="text-align:left; font-size:2em;margin-top:5px;">Danh mục sản phẩm: <?php echo $row_title['tendanhmuc'] ?> </p>
<div class="products">
    <?php
        while($row = mysqli_fetch_array($query_pro)){ 
    ?>
        <div class="products-info">
            
            <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
                <div class="products-img">  <img class="img img-responsive" width="100%" src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>"> </div>
                <p class="title_product" >Tên sản phẩm: <?php echo $row['tensanpham'] ?></p> 
                <p class="price_product" >  Giá bán: <?php echo number_format($row['giasp'],0,',','.').'vnđ' ?></p>
            </a>
        </div>
    <?php
        } 
    ?>
</div>

<?php
    $sql_trang = mysqli_query($mysqli,"SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_danhmuc = '$_GET[id]' ORDER BY tbl_sanpham.id_sanpham");
    $row_count = mysqli_num_rows($sql_trang);  
    $trang = ceil($row_count/3);
?>
<div class="paging">
    <p>Trang hiện tại: <?php echo $page ?>/<?php echo $trang ?></p>
    <ul class="paging-ul">  
        <?php
            for($i=1;$i<=$trang;$i++){ 
        ?>

        <li><a href="index.php?trangdanhmuc=<?php echo $i ?>"><?php echo $i ?></a></li>

        <?php
            } 
        ?>
    </ul>
</div>