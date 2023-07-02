<p>HELLO</p>
<?php
    include('../../config/connect.php');
    $id = $_GET['id'];
    $show = $_GET['show'];
    $idhd = $_GET['idhd'];
    $status = $_GET['status'];
    $iduser = $_GET['iduser'];
    $date = $_GET['date'];

    if($show == 1) {
        //sua
        $sql = "SELECT * FROM tbl_cart WHERE id_cart='".$id."' LIMIT 1";
        $row = mysqli_query($mysqli,$sql);
        $count = mysqli_num_rows($row);
        if($count>0) {
            $sql_update = mysqli_query($mysqli,"UPDATE tbl_cart SET cart_status='".$status."'");
            // $sql_update = "UPDATE tbl_cart SET id_khachhang = '".$iduser."',
            // code_cart = '".$idhd."', cart_status = '".$status."', cart_date = '".$date."'
            // WHERE id_cart = '$id'";
            // mysqli_query($mysqli,$sql_update);
            echo '<script>alert("Sửa thành công")</script>';
            header('Location:../../index.php?action=quanlydonhang&query=lietke');
        }else {
            echo '<script>alert("Sửa thất bại trong")</script>';
        }
    }else {
        echo '<script>alert("Sửa thất bại ngoài")</script>';
    }
?>