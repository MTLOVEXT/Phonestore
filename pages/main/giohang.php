<?php
    session_start();
?>
<p style="font-size:2em;color:white;">Giỏ hàng</p>
<?php
    if(isset($_SESSION['cart'])) {
        echo '<pre>';
        print_r($_SESSION['cart']);
        echo '</pre>';
    }
?>
