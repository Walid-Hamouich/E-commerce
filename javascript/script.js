var carticon = document.querySelector("#cart-icon");
var cart = document.querySelector(".cart");
var close = document.querySelector("#close");
var submenu = document.getElementById("subMenu");
carticon.onclick = () =>{
    cart.classList.add('active');
};
close.onclick = () =>{
    cart.classList.remove('active');
};



