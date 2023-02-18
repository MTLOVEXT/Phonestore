<?php 
    include("fsignup.php");
?>
<div id="id01" class="modal">
    <form class="modal-content animate" method="post">
        <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            <img src="./assets/img/user.jpg" alt="Avatar" class="avatar">
        </div>
        
        <div class="container">
            <form action="">
                <label for="uname"><b>Username</b></label>
                <input id="usernamedn" type="text" placeholder="Enter Username" name="uname" required>
        
                <label for="psw"><b>Password</b></label>
                <input id= "passdn" type="password" placeholder="Enter Password" name="psw" required>
                
                <button type="button" onclick="">Login</button>
                <p style="font-size: 2em;" id="result">Welcome Login...</p>
                <button type="button" onclick="signupform()">Chưa có tài khoản</button>
                <input type="checkbox" unchecked="checked" name="remember"> Remember me
            </form>
        </div>
    
        <!-- <div class="container" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
            <span class="psw">Forgot <a href="#">password?</a></span>
        </div> -->
    </form>
</div>