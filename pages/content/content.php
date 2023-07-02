<div id="content">
    <div class="section-heading">
        <div class="div-content-logo">
            <img class="content-img-logo" src="./assets/img/Logo.jpg" alt="">
        </div>
        <div class="div-content-product">
            <ul class="content-product-ul">
                <?php
                $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
                $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                while ($row = mysqli_fetch_array($query_danhmuc)) {
                    ?>
                    <li><a id="product-selection"
                            href="index.php?quanly=danhmucsanpham&id=<?php echo $row['id_danhmuc'] ?>"><?php echo $row['tendanhmuc'] ?></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="section-product">

    </div>
</div>