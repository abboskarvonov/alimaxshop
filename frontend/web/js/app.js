const hamburger_menu = document.querySelector(".hamburger-menu");
const container = document.querySelector(".menu-container");

hamburger_menu.addEventListener("click", () => {
    container.classList.toggle("active");
});