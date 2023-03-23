/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/review.js ***!
  \********************************/
var openModalBtn = document.querySelector("#open-modal");
var modal = document.querySelector("#modal");
var closeModalBtn = document.querySelector("#close-modal");
var modalOverlay = document.querySelector("#modal-overlay");
var openModal = function openModal() {
  modal.classList.remove("hidden");
  setTimeout(function () {
    modal.classList.remove("opacity-0");
    modalOverlay.classList.remove("hidden");
  }, 300); // durationと同じ値に合わせる
};

var closeModal = function closeModal() {
  modal.classList.add("opacity-0");
  setTimeout(function () {
    modal.classList.add("hidden");
    modalOverlay.classList.add("hidden");
  }, 300); // durationと同じ値に合わせる
};

openModalBtn.addEventListener("click", function () {
  return openModal();
});
closeModalBtn.addEventListener("click", function () {
  return closeModal();
});
modalOverlay.addEventListener("click", function () {
  return closeModal();
});
/******/ })()
;