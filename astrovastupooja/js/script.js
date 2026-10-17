const menuToggle=document.querySelector(".menu-toggle");

const mobileMenu=document.querySelector(".mobile-menu");

const overlay=document.querySelector(".menu-overlay");

const closeMenu=document.querySelector(".close-menu");

menuToggle.onclick=function(){

mobileMenu.classList.add("active");

overlay.classList.add("active");

}

closeMenu.onclick=function(){

mobileMenu.classList.remove("active");

overlay.classList.remove("active");

}

overlay.onclick=function(){

mobileMenu.classList.remove("active");

overlay.classList.remove("active");

}

// Header Scroll

window.addEventListener("scroll",function(){

document.querySelector(".astro-header").classList.toggle("scrolled",window.scrollY>50);

});

// Mobile menu item click

document.querySelectorAll(".mobile-menu a").forEach(link=>{

link.onclick=function(){

mobileMenu.classList.remove("active");

overlay.classList.remove("active");

}

});





const scrollBtn = document.getElementById("scrollTopBtn");

window.addEventListener("scroll", function () {

    if (window.scrollY > 300) {

        scrollBtn.classList.add("show");

    } else {

        scrollBtn.classList.remove("show");

    }

});

scrollBtn.addEventListener("click", function () {

    window.scrollTo({

        top: 0,

        behavior: "smooth"

    });

});