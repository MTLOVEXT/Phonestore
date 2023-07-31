<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./assets/img/p.png">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <link rel="stylesheet" href="./assets/img/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <title>PhoneStore</title>
</head>

<body>

    <?php
    include("./admincp/config/connect.php");
    include("./pages/header.php");
    include("./pages/content/content.php");
    include("./pages/banner.php");
    include("./pages/main.php");
    include("./pages/footer.php");
    ?>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="./assets/js/script.js"></script>
    <script src="./assets/js/Validator.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
        Validator({
            form: '#registrationForm',
            formGroupSelector: '.fmdangky__tr',
            errorSelector: '.warning-signup',
            rules: [
                Validator.isRequired('#username', 'Tên không được bỏ trống'),
                Validator.isRequired('#phone', 'Số điện thoại không được bỏ trống'),
                Validator.isSDT('#phone', 'Sai định dạng'),
                Validator.isRequired('#email', 'Email không được bỏ trống'),
                Validator.isEmail('#email'),
                Validator.isRequired('#password', 'Vui lòng nhập mật khẩu'),
                Validator.isRequired('#confirmpassword', 'Không được để trống vùng này'),
                Validator.isCheck('#confirmpassword', function() {
                    return document.querySelector('#registrationForm #password').value;
                }, 'Hai mật khẩu không giống nhau'),
            ],
            onSubmit: function(data) {
                console.log(data);
            }
        });
        const swiper = new Swiper('.swiper', {
        // Optional parameters
        direction: 'vertical',
        loop: true,

        // If we need pagination
        pagination: {
            el: '.swiper-pagination',
        },

        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        // And if we need scrollbar
        scrollbar: {
            el: '.swiper-scrollbar',
        },
    });
    </script>
</body>

</html>