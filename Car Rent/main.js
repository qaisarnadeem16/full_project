let menu=document.querySelector('#menu-icon');
let navbar=document.querySelector('.active');

menu.onclick = () =>{
    menu.classList.toggle('bx-x');
    navbar.classList.toggle('active');
}  
window.onscroll = () =>{

    menu.classList.remove('bx-x');
    navbar.classList.remove('active');
    
}

// function myFun() {
//     document.getElementById("menu-icon").classList.toggle("show");
//     let menu=document.querySelector('#menu-icon');
// let navbar=document.querySelector('.menubar');

// menu.onclick = () =>{
//     menu.classList.toggle('bx-x');
//     navbar.classList.toggle('active');
// }
//   }