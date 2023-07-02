<?php
    if(isset($_GET['trang'])){
        $page = $_GET['trang'];
    }else{
        $page = 1;
    }
    if($page == '' || $page == 1){
        $begin = 0;
    }else{
        $begin = ($page*3)-3;
    }
    $sql_pro = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY tbl_sanpham.id_sanpham DESC LIMIT $begin,3";
    $query_pro = mysqli_query($mysqli, $sql_pro);
?>
<p style="text-align:left; font-size:2em;margin-top:5px;">Sản phẩm mới nhất: </p>
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

<?php
    $sql_trang = mysqli_query($mysqli,"SELECT * FROM tbl_sanpham");
    $row_count = mysqli_num_rows($sql_trang);  
    $trang = ceil($row_count/3);
?>
<div class="paging">
    <p>Trang hiện tại: <?php echo $page ?>/<?php echo $trang ?></p>
    <ul class="paging-ul">  
        <?php
            for($i=1;$i<=$trang;$i++){ 
        ?>

        <li><a href="index.php?trang=<?php echo $i ?>"><?php echo $i ?></a></li>

        <?php
            } 
        ?>
    </ul>
</div>