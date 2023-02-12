<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="../assets/img/icons8-administrator-male-48.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/styleadmin.css">
    <title >Admin Page</title>
</head> 
<body>
    <p class="title-admin">Admin page</p>
    <div class="wrapper">
        <?php
            include("./modules/header.php");
            include("./modules/menu.php");
            include("./modules/main.php");
            include("./modules/footer.php");
        ?>
    </div>
    
</body>
</html>