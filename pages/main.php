<div id="main">
    <?php
        include("./pages/form/flogin.php")
      ?>

    <div class="div-content">
        <?php
            include("./pages/content/content1.php")
        ?>
        <div class="content2" id="noidung">
            <?php
                if(isset($_GET['quanly'])){
                    $tam = $_GET['quanly'];
                }else{
                    $tam = '';
                }
                if($tam == 'danhmucsanpham'){
                    include("./pages/main/danhmuc.php");
                }elseif($tam == 'giohang'){
                    include("./pages/main/giohang.php");
                }elseif($tam == 'danhmuc'){
                    include("./pages/main/danhmuc.php");
                }elseif($tam == 'donhang'){
                    include("./pages/main/donhang.php");
                }elseif($tam == 'hotro'){
                    include("./pages/main/hotro.php");
                }else{
                    include("./pages/main/index.php");
                }
            ?>
        </div>

    </div>

    <marquee class="marquee" behavior="scroll" bgcolor="pink">  
        <div class="marquee_div">
            <a href=""><img src="./assets/img/slider/Fold3-3699-rightbanner.png" alt=""></a>
            <a href=""><img src="./assets/img/slider/rightbanner-des-ipapro11.png" alt=""></a>
            <a href=""><img src="./assets/img/slider/poco-m5-series-sliding.png" alt=""></a>
        </div> 
    </marquee>
</div>