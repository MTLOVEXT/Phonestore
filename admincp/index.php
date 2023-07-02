<?php
    // session_start();
    // if(!isset($_SESSION['dangnhap'])) {
    //     header('Location:../index.php');
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="../assets/img/icons8-administrator-male-48.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/styleadmin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <title >Admin Page</title>
</head> 
<body>
    <p class="title-admin">Admin page</p>
    <div class="wrapper">
        <?php
            include("./config/connect.php");
            include("./modules/header.php");
            include("./modules/menu.php");
            include("./modules/main.php");
            include("./modules/footer.php");
        ?>
    </div>
    <script src="./assets/admin.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script type="text/javascript">
   	$(document).ready(function(){
   		thongke();
	    var char = new Morris.Area({
		
		  element: 'Chart',
		
		  xkey: 'date',
		 
		  ykeys: ['date','order','sales','quantity'],
		
		  labels: ['Đơn hàng','Doanh thu','Số lượng bán ra','Số lượng']
		});

		$('.select-date').change(function(){
            var thoigian = $(this).val();
            if(thoigian=='7ngay'){
                var text = '7 ngày qua';
            }else if(thoigian=='28ngay'){
                var text = '28 ngày qua';
            }else if(thoigian=='90ngay'){
                var text = '90 ngày qua';
            }else{
                var text = '365 ngày qua';
            }

             $.ajax({
                    url:"./modules/thongke.php",
                    method:"POST",
                    dataType:"JSON",
                    data:{thoigian:thoigian},
                    success:function(data)
                    {
                        char.setData(data);
                        $('#text-date').text(text);
                    }   
                });
        })
		 function thongke(){
                var text = '365 ngày qua';
                $('#text-date').text(text);
                $.ajax({
                    url:"./modules/thongke.php",
                    method:"POST",
                    dataType:"JSON",
                    success:function(data)
                    {
                        char.setData(data);
                        $('#text-date').text(text);
                    }   
                });
            }
	});
    </script>
</body>
</html>