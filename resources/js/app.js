import 'bootstrap';
import './dashboard';
import './chart';
import './dashboard-counter';

// SweetAlert
import Swal from 'sweetalert2';
window.Swal = Swal;

// CKEditor
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

window.ClassicEditor = ClassicEditor;

// Navbar scroll effect
window.addEventListener("scroll", () => {

    const navbar = document.querySelector(".navbar-custom");

    if(window.scrollY > 30){
        navbar.classList.add("scrolled");

    }else{
        navbar.classList.remove("scrolled");
    }
});