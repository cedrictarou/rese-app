/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!************************************!*\
  !*** ./resources/js/search-btn.js ***!
  \************************************/
var searchBtn = document.querySelector("#search-btn");
var overlay = document.querySelector("#overlay");
var searchBox = document.querySelector("#search-box");
searchBtn.addEventListener("click", function () {
  searchBtn.classList.toggle("hidden");
  searchBox.classList.toggle("translate-x-full");
});
overlay.addEventListener("click", function () {
  searchBox.classList.toggle("translate-x-full");
  searchBtn.classList.toggle("hidden");
});
/******/ })()
;