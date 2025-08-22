function swapSideMenuActive(elementID) {
    if (document.getElementById(elementID) != null) {
        document.getElementById(elementID).classList.add("active");
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
    
    if (document.getElementById("menu-about") != null) {
        if (scrolled >= 0 && scrolled <= 12.5) {
            swapSideMenuActive("menu-about");
        } else if (scrolled > 12.5 && scrolled <= 35) {
            swapSideMenuActive("menu-education");
        } else if (scrolled > 35 && scrolled <= 55) {
            swapSideMenuActive("menu-experience");
        } else if (scrolled > 55 && scrolled <= 75) {
            swapSideMenuActive("menu-skills");
        } else if (scrolled > 75 && scrolled <= 90) {
            swapSideMenuActive("menu-projects");
        } else if (scrolled > 90) {
            swapSideMenuActive("menu-contact");
        }
    } else if (document.getElementById("menu-project") != null) {
        if (scrolled >= 0 && scrolled <= 15) {
            swapSideMenuActive("menu-project");
        } else if (scrolled > 15 && scrolled <= 37.5) {
            swapSideMenuActive("menu-movement");
        } else if (scrolled > 37.5 && scrolled <= 60) {
            swapSideMenuActive("menu-interaction");
        } else if (scrolled > 60 && scrolled <= 82.5) {
            swapSideMenuActive("menu-multiple");
        } else if (scrolled > 82.5) {
            swapSideMenuActive("menu-future");
        }
    } else if (document.getElementById("menu-ssc") != null) {
        if (scrolled >= 0 && scrolled <= 12.5) {
            swapSideMenuActive("menu-ssc");
        } else if (scrolled > 12.5 && scrolled <= 35) {
            swapSideMenuActive("menu-petden");
        } else if (scrolled > 35 && scrolled <= 60) {
            swapSideMenuActive("menu-proteinpower");
        } else if (scrolled > 60 && scrolled <= 85) {
            swapSideMenuActive("menu-gurren");
        } else if (scrolled > 85) {
            swapSideMenuActive("menu-playingcards");
        }
    } else if (document.getElementById("menu-current") != null) {
        if (scrolled >= 0 && scrolled <= 22.5) {
            swapSideMenuActive("menu-current");
        } else if (scrolled > 22.5 && scrolled <= 67.5) {
            swapSideMenuActive("menu-space");
        } else if (scrolled > 67.5) {
            swapSideMenuActive("menu-delivery");
        }
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