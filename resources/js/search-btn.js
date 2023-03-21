const searchBtn = document.querySelector("#search-btn");
const overlay = document.querySelector("#overlay");
const searchBox = document.querySelector("#search-box");

searchBtn.addEventListener("click", () => {
    searchBtn.classList.toggle("hidden");
    searchBox.classList.toggle("translate-x-full");
});

overlay.addEventListener("click", () => {
    searchBox.classList.toggle("translate-x-full");
    searchBtn.classList.toggle("hidden");
});
