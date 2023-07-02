function signupform() {
  document.getElementById('dk').style.display = 'block';
  document.getElementById('id01').style.display = 'none';
}

function changeform() {
  document.getElementById('modal-change').style.display = 'block';
  document.getElementById('id01').style.display = 'none';
}

function loginform() {
  document.getElementById('id01').style.display = 'block';
  document.getElementById('dk').style.display = 'none';
}


//kh
function loginformkh() {
  document.getElementById('id01').style.display = 'block';
  document.getElementById('floginnv').style.display = 'none';
}

function loginformnv() {
  document.getElementById('floginnv').style.display = 'block';
  document.getElementById('id01').style.display = 'none';
}

function tab1() {
  document.getElementById('tab1').style.display = 'block';
  document.getElementById('tab2').style.display = 'none';
  document.getElementById('tab3').style.display = 'none';
}

function tab2() {
  document.getElementById('tab2').style.display = 'block';
  document.getElementById('tab1').style.display = 'none';
  document.getElementById('tab3').style.display = 'none';
}

function tab3() {
  document.getElementById('tab3').style.display = 'block';
  document.getElementById('tab1').style.display = 'none';
  document.getElementById('tab2').style.display = 'none';
}

var passwordInput = document.getElementById("passdnnv");
var toggleButton = document.getElementById("btndn");
// Lấy đối tượng icon hiện tại
var currentIcon = document.getElementById('current-icon');

// Tạo một đối tượng icon mới
var newIcon = document.createElement('i');
newIcon.className = 'fas fa-eye-slash';

toggleButton.addEventListener("click", function () {
  if (passwordInput.type === "password") {
    currentIcon.parentNode.replaceChild(newIcon, currentIcon);
    passwordInput.type = "text";
  } else {
    newIcon.parentNode.replaceChild(currentIcon, newIcon);
    passwordInput.type = "password";
  }
});

//Login khách hàng

var passdnKH = document.getElementById("passdnkh");
var btndnkh = document.getElementById("btndnkh");
// Lấy đối tượng icon hiện tại
var currentIconkh = document.getElementById('current-iconkh');

// Tạo một đối tượng icon mới
var newIcon1 = document.createElement('i');
newIcon1.className = 'fas fa-eye-slash';

btndnkh.addEventListener("click", function () {
  if (passdnKH.type === "password") {
    currentIconkh.parentNode.replaceChild(newIcon1, currentIconkh);
    passdnKH.type = "text";
  } else {
    newIcon1.parentNode.replaceChild(currentIconkh, newIcon1);
    passdnKH.type = "password";
  }
});

//Change pass
var cPassword = document.getElementById("cPassword");
var btnCpass = document.getElementById("btnCpass");
// Lấy đối tượng icon hiện tại
var currentIconPass = document.getElementById('current-iconpass');

// Tạo một đối tượng icon mới
var newIcon1 = document.createElement('i');
newIcon1.className = 'fas fa-eye-slash';

btnCpass.addEventListener("click", function () {
  if (cPassword.type === "password") {
    currentIconPass.parentNode.replaceChild(newIcon1, currentIconPass);
    cPassword.type = "text";
  } else {
    newIcon1.parentNode.replaceChild(currentIconPass, newIcon1);
    cPassword.type = "password";
  }
});

//
var conPassword = document.getElementById("conPassword");
var conbtnCpass = document.getElementById("conbtnCpass");
// Lấy đối tượng icon hiện tại
var currentIconCPass = document.getElementById('current-iconcpass');

// Tạo một đối tượng icon mới
var newIcon1 = document.createElement('i');
newIcon1.className = 'fas fa-eye-slash';

conbtnCpass.addEventListener("click", function () {
  if (conPassword.type === "password") {
    currentIconCPass.parentNode.replaceChild(newIcon1, currentIconCPass);
    conPassword.type = "text";
  } else {
    newIcon1.parentNode.replaceChild(currentIconCPass, newIcon1);
    conPassword.type = "password";
  }
});

// // Toast function
// function toast({
//   title = "",
//   message = "",
//   type = "info",
//   duration = 3000
// }) {
//   const main = document.getElementById("toast");
//   if (main) {
//     const toast = document.createElement("div");

//     // Auto remove toast
//     const autoRemoveId = setTimeout(function () {
//       main.removeChild(toast);
//     }, duration + 1000);

//     // Remove toast when clicked
//     toast.onclick = function (e) {
//       if (e.target.closest(".toast__close")) {
//         main.removeChild(toast);
//         clearTimeout(autoRemoveId);
//       }
//     };

//     const icons = {
//       success: "fa-solid fa-circle-check",
//       info: "fa-solid fa-circle-info",
//       error: "fa-solid fa-circle-exclamation"
//     };
//     const icon = icons[type];
//     const delay = (duration / 1000).toFixed(2);

//     toast.classList.add("toast", `toast__${type}`);
//     toast.style.animation = `slideInLeft ease .3s, fadeOut linear 1s ${delay}s forwards`;

//     toast.innerHTML = `
//                     <div class="toast__icon">
//                         <i class="${icon}"></i>
//                     </div>
//                     <div class="toast__body">
//                         <h3 class="toast__title">${title}</h3>
//                         <p class="toast__msg">${message}</p>
//                     </div>
//                     <div class="toast__close">
//                         <i class="fa-solid fa-xmark"></i>
//                     </div>
//                 `;
//     main.appendChild(toast);
//   }
// }