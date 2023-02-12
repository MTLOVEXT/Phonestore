document.getElementsByClassName(nav-menu).onclick = function (e) {
  document.getElementById(nav).classList.toggle("active");
}
// function myFunction() {
//     var x = document.getElementById("myTopnav");
//     if (x.className === "topnav") {
//       x.className += " responsive";
//     } else {
//       x.className = "topnav";
//     }
//   }
// document.getElementById("search").onclick = function () {
//     document.getElementById("search-txt").style.display="inline-block";
// }

var a = [
  {
    product: "Samsung a12",
    price: 4000000,
    img: './assets/img/SS/ss_a12.jpg',
    button: "Bỏ vào giỏ hàng"
  },
  {
    product: "Samsung a13",
    price: 4000000,
    img: './assets/img/SS/ss_a13.jpg',
    button: "Bỏ vào giỏ hàng"
  },
  {
    product: "Samsung a23",
    price: 4000000,
    img: './assets/img/SS/ss_a23.jpg',
    button: "Bỏ vào giỏ hàng"
  },
  {
    product: "Samsung a33",
    price: 4000000,
    img: './assets/img/SS/ss_a33.jpg',
    button: "Bỏ vào giỏ hàng"
  }
]

// function xulyclick(id) {
//   inner = ""
//   for(i=0;i<a.length;i++) {
//     inner += "<div class='product'><img src='" + a[i].img + "'/><p style='text-align: center'>" + a[i].product + "<br>Giá bán: " + a[i].price + "</p><button>" + a[i].button + "</button></div>";
//   }
  
//   document.getElementById("noidung").innerHTML = inner;
// }

function xulyclick(id) {
  alert("xulyclick");
}