<div id="toast">
    <!-- Success -->
    <!-- <div class="toast toast__Success">
        <div class="toast__icon">
            <i class="fa-solid fa-circle-check"></i>
        </div>
        <div class="toast__body">
            <h3 class="toast__title toast__Success">Success</h3>
            <p class="toast__msg toast__Success">Đăng nhập thành công</p>
        </div>
        <div class="toast__close">
            <i class="fa-solid fa-xmark"></i>
        </div>
    </div> -->
</div>
<div class="toastMessage">

    <!-- Success -->
    <!-- <div class="toast toast__Success">
        <div class="toast__icon">
            <i class="fa-solid fa-circle-check"></i>
        </div>
        <div class="toast__body">
            <h3 class="toast__title toast__Success">Success</h3>
            <p class="toast__msg toast__Success">Đăng nhập thành công</p>
        </div>
        <div class="toast__close">
            <i class="fa-solid fa-xmark"></i>
        </div>
    </div> -->

    <!-- Info -->
    <!-- <div class="toast toast__Info">
        <div class="toast__icon">
            <i class="fa-solid fa-circle-info"></i>
        </div>
        <div class="toast__body">
            <h3 class="toast__title toast__Info">Info</h3>
            <p class="toast__msg toast__Info">Thiếu thông tin đăng nhập</p>
        </div>
        <div class="toast__close">
            <i class="fa-solid fa-xmark"></i>
        </div>
    </div> -->

    <!-- Error -->
    <!-- <div class="toast toast__Error">
        <div class="toast__icon">
            <i class="fa-solid fa-circle-exclamation"></i>
        </div>
        <div class="toast__body">
            <h3 class="toast__title toast__Error">Error</h3>
            <p class="toast__msg toast__Error">Đăng nhập thất bại</p>
        </div>
        <div class="toast__close">
            <i class="fa-solid fa-xmark"></i>
        </div>
    </div> -->

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="../../assets/js/script.js"></script>
    <link rel="stylesheet" href="../../assets/css/style.css"> -->

    <!-- <div>
        <div onclick="showSuccessToast();" class="btn btn--success">Show success toast</div>
        <div onclick="showErrorToast();" class="btn btn--danger">Show error toast</div>
    </div> -->

    <script>
        function showSuccessToast() {
            toast({
                title: "Thành công!",
                message: "Bạn đã đăng ký thành công tài khoản tại F8.",
                type: "Success",
                duration: 5000
            });
        }

        function showErrorToast() {
            toast({
                title: "Thất bại!",
                message: "Có lỗi xảy ra, vui lòng liên hệ quản trị viên.",
                type: "Error",
                duration: 5000
            });
        }
    </script>

</div>