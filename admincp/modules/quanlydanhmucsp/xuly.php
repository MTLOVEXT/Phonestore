<?php++
    include('../../config/connect.php');
    $tenloaisp = $_POST['tendanhmuc'];
    $thutu = $_POST['thutu'];
    if(isset($_POST['btn_themdanhmuc'])) {
        //them
        $sql_them = "INSERT INTO tbl_danhmuc(tendanhmuc,thutu) VALUE('".$tenloaisp."','".$thutu."')";
        mysqli_query($mysqli,$sql_them);
        header('Location:../../modules/index.php?action=quanlydanhmucsp&query=them');
    }elseif(isset($_POST['btn_suadanhmuc'])) {
        $sql_update = "UPDATE tbl_danhmuc SET tendanhmuc = '".$tenloaisp."', thutu = '".$thutu."' WHERE id_danhmuc= '$_GET[iddanhmuc]'";
        mysqli_query($mysqli,$sql_update);
        header('Location:../../modules/index.php?action=quanlydanhmucsp&query=them');
    }else {
        $id = $_GET['iddanhmuc'];
        $sql_xoa = "DELETE FROM tbl_danhmuc WHERE iddanhmuc = '".$id."'";
        mysqli_query($mysqli,$sql_xoa);
        header('Location:../../modules/index.php?action=quanlydanhmucsp&query=them');
    }
?>