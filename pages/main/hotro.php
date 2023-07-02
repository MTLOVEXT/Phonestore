<?php
    include('./admincp/config/connect.php');
    if (isset($_POST['submithotro'])) {
        $email = $_POST['username-message'];
        $messagehotro = $_POST['message-hotro'];
        $hotro = mysqli_query($mysqli, "INSERT INTO tbl_hotro(email,messages) VALUES('" . $email . "','" . $messagehotro . "')");
        if ($hotro) {
            echo '<script>alert("Cảm ơn bạn đã hỗ trợ");</script>';
            // echo '<script>window.location.href = "./index.php"</script>';
        } else {
            echo '<script>alert("Cảm ơn bạn đã tin tưởng sử dụng")</script>';
        }
    }
?>

<h1 style="color:red;">Quí khách cần hỗ trợ gì</h1>
<form class="support" method="POST">
    <label style="font-size:2em;float:left;" class="lb-message" for="uname-message">Email</label>
    <input class="username-message" type="text" name="username-message" placeholder="ABC@gmail.com">
    <input type="text" style="height: fit-content;" class="message-customer" placeholder="Việc cần hỗ trợ" name="message-hotro">
    <button type="submit" name="submithotro" class="btn-message" style="float: left;">Gửi</button>
</form>

<div class="Customer__feedback"> Các việc cần hỗ trợ
    <?php
    $sql_pro = "SELECT * FROM tbl_hotro WHERE 1";
    $query_pro = mysqli_query($mysqli, $sql_pro);
    ?>

    <div class="support__customer">
        <?php
            while ($row = mysqli_fetch_array($query_pro)) {
        ?>
        <div id="support__question" class="support__center support__question">
            <p><?php echo $row['messages'] ?></p>
        </div>

        <div id="support__answer" class="support__center support__answer disnable">
            <p><?php echo $row['reply'] ?></p>
        </div>
        <?php
            }
        ?>
    </div>
</div>