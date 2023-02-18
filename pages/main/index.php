<?php
	$sql_pro = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY tbl_sanpham.id_sanpham DESC LIMIT 20";
	$query_pro = mysqli_query($mysqli,$sql_pro);
?>
<p style="text-align:left; font-size:2em;margin-top:5px;">Sản phẩm mới nhất: </p>
<div class="products">
    <?php 
        while($row = mysqli_fetch_array($query_pro)) {
    ?>
    <div >
        <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham']?>">
            <img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh']?>">
            <p class="title_product" >Tên sản phẩm: <?php echo $row['tensanpham']?> <br> </p> 
            <p class="price_product" >  Giá bán: <?php echo number_format($row['giasp'],0,',','.').'vnđ'?></p>
            <p style="font-size:em;color:#000;"><?php echo $row['tendanhmuc']?></p></p>
        </a>
    </div>
    <?php
        }
    ?>

</div>