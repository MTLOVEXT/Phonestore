<?php
	$sql_pro = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_danhmuc='$_GET[id]' ORDER BY id_sanpham DESC";
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
        <div >
            
            <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
                <img class="img img-responsive" width="100%" src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>">
                <p class="title_product" >Tên sản phẩm: <?php echo $row['tensanpham'] ?></p> 
                <p class="price_product" >  Giá bán: <?php echo number_format($row['giasp'],0,',','.').'vnđ' ?></p>
            </a>
        </div>
    <?php
        } 
    ?>
</div>