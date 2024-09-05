/*====================
  Menu sidebar 
======================*/
document
    .getElementById("offcanvas-close")
    .addEventListener("click", function () {
        var offcanvasSide = document.getElementById("offcanvasNavbar");
        offcanvasSide.classList.remove("show");
    });