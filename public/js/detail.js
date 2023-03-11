/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/detail.js ***!
  \********************************/
// date
var dateInput = document.querySelector("#date");
var confirmDate = document.querySelector("#confirm-date");
dateInput.addEventListener("input", function () {
  confirmDate.innerText = dateInput.value;
});

// time
var timeInput = document.querySelector("#time");
var confirmTime = document.querySelector("#confirm-time");
timeInput.addEventListener("input", function () {
  confirmTime.innerText = timeInput.value;
});

// number of poeple
var numberInput = document.querySelector("#number");
var confirmNumber = document.querySelector("#confirm-number");
numberInput.addEventListener("input", function () {
  confirmNumber.innerText = numberInput.value + "人";
});

// shop name
var shopNameInput = document.querySelector("#shop-name");
var confirmShopName = document.querySelector("#confirm-shop-name");
confirmShopName.innerText = shopNameInput.innerText;
/******/ })()
;