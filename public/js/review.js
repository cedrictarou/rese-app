/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/review.js ***!
  \********************************/
var openModalBtn = document.querySelector("#open-modal");
var modal = document.querySelector("#modal");
var closeModalBtn = document.querySelector("#close-modal");
var modalOverlay = document.querySelector("#modal-overlay");
var openAndCloseModal = function openAndCloseModal() {
  modal.classList.toggle("hidden");
  modalOverlay.classList.toggle("hidden");
};
openModalBtn.addEventListener("click", function () {
  return openAndCloseModal();
});
closeModalBtn.addEventListener("click", function () {
  return openAndCloseModal();
});
modalOverlay.addEventListener("click", function () {
  return openAndCloseModal();
});
/******/ })()
;