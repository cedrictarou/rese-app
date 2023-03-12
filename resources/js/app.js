import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

// navigation bar
const navBtn = document.querySelector("#nav-btn");
const navClose = document.querySelector("#nav-close");
const nav = document.querySelector("#nav");

navBtn.addEventListener("click", () => {
    nav.classList.toggle("-translate-x-full");
});
navClose.addEventListener("click", () => {
    nav.classList.toggle("-translate-x-full");
});
