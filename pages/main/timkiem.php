<?php
	if(isset($_POST['timkiem'])){
		$tukhoa = $_POST['tukhoa'];
	}
	$sql_pro = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_danhmuc.tendanhmuc LIKE '%".$tukhoa."%' AND tbl_sanpham.tensanpham LIKE '%".$tukhoa."%'";
	$query_pro = mysqli_query($mysqli,$sql_pro);
	
?>
<p style="text-align:left; font-size:2em;margin-top:5px;">Từ khóa tìm kiếm: <?php $_POST['tukhoa'] ?> </p>
<div class="products">
    <?php
    while ($row = mysqli_fetch_array($query_pro)) {
        ?>
        <div class="products-info">
            <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
                <div class="products-img"> <img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>"></div>
                <p class="title_product">Tên sản phẩm:
                    <?php echo $row['tensanpham'] ?> <br>
                </p>
                <p class="price_product"> Giá bán:
                    <?php echo number_format($row['giasp'], 0, ',', '.') . 'vnđ' ?>
                </p>
            </a>
        </div>
        <?php
    }
    ?>

</div>