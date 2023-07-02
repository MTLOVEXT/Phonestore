<?php 
    include('../../config/connect.php');
    //them
    $id = $_POST['ID'];
    $hovatenh = $_POST['hovaten'];
    $hovaten = ucwords($hovatenh);
    $username = $_POST['username'];
    $pass = md5($_POST['matkhau']);
    $email = $_POST['email'];
    $phone = $_POST['dienthoai'];
    $diachi = $_POST['diachi'];
    //sua
    $ids = $_POST['IDnv'];
    $hovatensh = $_POST['hovatennv'];
    $hovatens = ucwords($hovatensh);
    $usernames = $_POST['usernamenv'];
    $passs = md5($_POST['matkhaunv']);
    $emails = $_POST['emailnv'];
    $phones = $_POST['dienthoainv'];
    $diachis = $_POST['diachinv'];
    $idvaitro = 2;

    if(isset($_POST['themkh'])) {
        //them
        $sql_them = "INSERT INTO tbl_dangky(id_dangky,tennv,hovaten,matkhau,email,dienthoai,diachi,vaitro) 
        VALUE('".$id."','".$hovaten."','".$username."','".$pass."','".$email."','".$phone."','".$diachi."',2)";
        mysqli_query($mysqli,$sql_them);
        header('Location:../../index.php?action=quanlyuser&query=lietke');
    }elseif(isset($_POST['suakh'])) {
        //sua
        $sql_update = "UPDATE tbl_dangky SET id_dangky = '".$ids."', tennv = '".$hovatens."',
         hovaten = '".$usernames."', matkhau = '".$passs."', email = '".$emails."', 
         dienthoai = '".$phones."', diachi = '".$diachis."', vaitro = '".$idvaitro."'
          WHERE id_dangky = '$_GET[id]'";
        mysqli_query($mysqli,$sql_update);
        header('Location:../../index.php?action=quanlyuser&query=lietke');
    }else {
        //xoa
        $id = $_GET['idkh'];
        $sql_xoa = "DELETE FROM tbl_dangky WHERE id_dangky = '".$id."'";
        mysqli_query($mysqli,$sql_xoa);
        header('Location:../../index.php?action=quanlyuser&query=lietke');
    }
?>