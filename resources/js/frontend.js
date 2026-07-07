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
    ".reveal, .reveal-left, .reveal-right"
);

function revealScroll(){

    reveals.forEach((el)=>{

        const top = el.getBoundingClientRect().top;

        const trigger = window.innerHeight - 120;

        if(top < trigger){

            el.classList.add("active");

        }

    });

}

window.addEventListener("scroll", revealScroll);

revealScroll();