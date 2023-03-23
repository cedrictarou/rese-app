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

// smoth scrolling
const smoothScrollTrigger = document.querySelectorAll('a[href^="#"]');
smoothScrollTrigger.forEach((trigger) => {
    trigger.addEventListener("click", (e) => {
        e.preventDefault();
        const href = trigger.getAttribute("href");
        const targetElement = document.getElementById(href.replace("#", ""));
        const rect = targetElement.getBoundingClientRect().top;
        const offset = window.pageYOffset;
        const gap = 10;
        const target = rect + offset - gap;
        window.scrollTo({
            top: target,
            behavior: "smooth",
        });
    });
});
