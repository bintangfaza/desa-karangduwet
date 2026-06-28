document.addEventListener("DOMContentLoaded", () => {

    const sidebar = document.getElementById("sidebar");
    const main = document.getElementById("mainContent");
    const toggle = document.getElementById("toggleSidebar");
    const overlay = document.getElementById("sidebarOverlay");
    const icon = document.getElementById("toggleIcon");

    function closeMobileSidebar(){

        sidebar.classList.remove("show");
        overlay.classList.remove("show");

        document.body.classList.remove("overflow-hidden");

        icon.className="bi bi-list";

    }

    toggle.addEventListener("click",()=>{

        if(window.innerWidth>992){

            sidebar.classList.toggle("collapsed");

            main.classList.toggle("collapsed");

        }

        else{

            sidebar.classList.toggle("show");

            overlay.classList.toggle("show");

            document.body.classList.toggle("overflow-hidden");

            icon.className=sidebar.classList.contains("show")
                ? "bi bi-x-lg"
                : "bi bi-list";

        }

    });

    overlay.addEventListener("click",closeMobileSidebar);

    window.addEventListener("resize",()=>{

        if(window.innerWidth>992){

            closeMobileSidebar();

        }

    });

});