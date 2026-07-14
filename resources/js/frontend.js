document.addEventListener("DOMContentLoaded", () => {
    const navbar = document.getElementById("frontend-navbar");
    const toggle = document.getElementById("frontend-navbar-toggle");
    const drawer = document.getElementById("frontend-drawer");
    const overlay = document.getElementById("frontend-overlay");
    if (!navbar || !toggle || !drawer || !overlay) return;
    // =====================================
    // Navbar Blur Saat Scroll
    // =====================================

    window.addEventListener("scroll", () => {
        if (window.scrollY > 30) {
            navbar.classList.add("scrolled");
        } else {
            navbar.classList.remove("scrolled");
        }
    });

    // =====================================
    // Open Drawer
    // =====================================

    function openDrawer() {
        drawer.classList.add("show");
        overlay.classList.add("show");
        document.body.style.overflow = "hidden";
        toggle.innerHTML = '<i class="bi bi-x-lg"></i>';
    }

    // =====================================
    // Close Drawer
    // =====================================

    function closeDrawer() {
        drawer.classList.remove("show");
        overlay.classList.remove("show");
        document.body.style.overflow = "";
        toggle.innerHTML = '<i class="bi bi-list"></i>';
    }

    // =====================================
    // Toggle Drawer
    // =====================================

    toggle.addEventListener("click", () => {
        if (drawer.classList.contains("show")) {
            closeDrawer();
        } else {
            openDrawer();
        }
    });

    // =====================================
    // Klik Overlay
    // =====================================

    overlay.addEventListener("click", closeDrawer);

    // =====================================
    // Klik Menu
    // =====================================

    document.querySelectorAll(".frontend-drawer-menu a").forEach(link => {
        link.addEventListener("click", closeDrawer);
    });

    // =====================================
    // Resize Desktop
    // =====================================

    window.addEventListener("resize", () => {
        if (window.innerWidth >= 992) {
            closeDrawer();
        }
    });
});


/* ===========================
   Reveal Animation
=========================== */

const reveals = document.querySelectorAll(
    ".reveal, .reveal-left, .reveal-right, .reveal-left-ori"
);

function revealScroll() {

    reveals.forEach((el) => {

        const top = el.getBoundingClientRect().top;

        const trigger = window.innerHeight - 120;

        if (top < trigger) {

            el.classList.add("active");

        }

    });

}

window.addEventListener("scroll", revealScroll);

revealScroll();

//Swiper
import Swiper from "swiper";
import { Navigation, Pagination, Autoplay } from "swiper/modules";

import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";

new Swiper(".teamSwiper", {

    modules: [Navigation, Pagination, Autoplay],

    loop: true,

    speed: 700,

    spaceBetween: 25,

    autoplay: {

        delay: 3500,

        disableOnInteraction: false,

    },

    navigation: {

        nextEl: ".team-next",

        prevEl: ".team-prev",

    },

    pagination: {

        el: ".swiper-pagination",

        clickable: true,

    },

    breakpoints: {

        0: {
            slidesPerView: 1.2,
            spaceBetween: 18
        },

        576: {
            slidesPerView: 2,
            spaceBetween: 20
        },

        768: {
            slidesPerView: 3,
            spaceBetween: 24
        },

        1200: {
            slidesPerView: 4,
            spaceBetween: 28
        }

    }

});

//Anggota

const button = document.getElementById("showMoreTeam");
const grid = document.getElementById("teamGrid");

button.addEventListener("click", function () {

    grid.classList.toggle("show-all");
    button.classList.toggle("active");

    if (grid.classList.contains("show-all")) {

        button.querySelector("span").innerHTML = "Sembunyikan Tim";

    } else {

        button.querySelector("span").innerHTML = "+ 12 Anggota Lainnya";

    }

});

//Devisi


const divisionSlider = document.getElementById("divisionSlider");

const divisionPrev = document.querySelector(".division-prev");

const divisionNext = document.querySelector(".division-next");

divisionNext.addEventListener("click", () => {

    divisionSlider.scrollBy({

        left: 420,

        behavior: "smooth"

    });

});

divisionPrev.addEventListener("click", () => {

    divisionSlider.scrollBy({

        left: -420,

        behavior: "smooth"

    });

});



