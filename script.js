window.onscroll = function() {
    var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    var scrolled = (winScroll / height) * 100;
    
    var active = document.getElementsByClassName("active");
    if (active.length > 0) {
        active[0].classList.remove("active");
    }
    
    if (scrolled >= 0 && scrolled <= 15) {
        document.getElementById("menu-about").classList.add("active");
    } else if (scrolled > 15 && scrolled <= 35) {
        document.getElementById("menu-skills").classList.add("active");
    } else if (scrolled > 35 && scrolled <= 57.5) {
        document.getElementById("menu-projects").classList.add("active");
    } else if (scrolled > 57.5 && scrolled <= 87.5) {
        document.getElementById("menu-education").classList.add("active");
    } else if (scrolled > 87.5) {
        document.getElementById("menu-contact").classList.add("active");
    }
}

let slideIndex1 = 1;
let slideIndex2 = 1;
let slideIndex3 = 1;
showSlides1(slideIndex1);
showSlides2(slideIndex2);
showSlides3(slideIndex3);

function plusSlides1(n) {
  showSlides1(slideIndex1 += n);
}
function currentSlide1(n) {
  showSlides1(slideIndex1 = n);
}
function showSlides1(n) {
    let i;
    let slides1 = document.getElementsByClassName("slides1");
    if (n > slides1.length) {slideIndex1 = 1}
    if (n < 1) {slideIndex1 = slides1.length}
    for (i = 0; i < slides1.length; i++) {
        slides1[i].style.display = "none";
    }
    slides1[slideIndex1 - 1].style.display = "block";
}
function plusSlides2(n) {
  showSlides2(slideIndex2 += n);
}
function currentSlide2(n) {
  showSlides2(slideIndex2 = n);
}
function showSlides2(n) {
    let i;
    let slides2 = document.getElementsByClassName("slides2");
    if (n > slides2.length) {slideIndex2 = 1}
    if (n < 1) {slideIndex2 = slides2.length}
    for (i = 0; i < slides2.length; i++) {
        slides2[i].style.display = "none";
    }
    slides2[slideIndex2 - 1].style.display = "block";
}
function plusSlides3(n) {
  showSlides3(slideIndex3 += n);
}
function currentSlide3(n) {
  showSlides3(slideIndex3 = n);
}
function showSlides3(n) {
    let i;
    let slides3 = document.getElementsByClassName("slides3");
    if (n > slides3.length) {slideIndex3 = 1}
    if (n < 1) {slideIndex3 = slides3.length}
    for (i = 0; i < slides3.length; i++) {
        slides3[i].style.display = "none";
    }
    slides3[slideIndex3 - 1].style.display = "block";
}