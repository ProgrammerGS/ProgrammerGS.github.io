var modal1 = document.getElementById("modal1");
var modal2 = document.getElementById("modal2");
var modal3 = document.getElementById("modal3");
var modal4 = document.getElementById("modal4");
var modal5 = document.getElementById("modal5");
var modal6 = document.getElementById("modal6");

window.onclick = function(event) {
    if (event.target == modal1) {
        modal1.style.display = "none";
    } else if (event.target == modal2) {
        modal2.style.display = "none";
    } else if (event.target == modal3) {
        modal3.style.display = "none";
    } else if (event.target == modal4) {
        modal4.style.display = "none";
    } else if (event.target == modal5) {
        modal5.style.display = "none";
    } else if (event.target == modal6) {
        modal6.style.display = "none";
    }
}

function open_modal(num) {
    if (num == 1) {
        modal1.style.display = "block";
    } else if (num == 2) {
        modal2.style.display = "block";
    } else if (num == 3) {
        modal3.style.display = "block";
    } else if (num == 4) {
        modal4.style.display = "block";
    } else if (num == 5) {
        modal5.style.display = "block";
    } else if (num == 6) {
        modal6.style.display = "block";
    }
}

function hide_modal(num) {
    if (num == 1) {
        modal1.style.display = "none";
    } else if (num == 2) {
        modal2.style.display = "none";
    } else if (num == 3) {
        modal3.style.display = "none";
    } else if (num == 4) {
        modal4.style.display = "none";
    } else if (num == 5) {
        modal5.style.display = "none";
    } else if (num == 6) {
        modal6.style.display = "none";
    }
}

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
    } else if (scrolled > 15 && scrolled <= 32.5) {
        document.getElementById("menu-skills").classList.add("active");
    } else if (scrolled > 32.5 && scrolled <= 72.5) {
        document.getElementById("menu-projects").classList.add("active");
    } else if (scrolled > 72.5 && scrolled <= 92.5) {
        document.getElementById("menu-education").classList.add("active");
    } else if (scrolled > 92.5) {
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