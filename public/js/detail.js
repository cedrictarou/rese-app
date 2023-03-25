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

// show more
var commentTextArray = document.querySelectorAll(".comment-text");
commentTextArray.forEach(function (commentText) {
  var text = commentText.innerText;
  if (text.length >= 100) {
    var truncatedText = text.slice(0, 100) + "...";
    var showMore = document.createElement("button");
    showMore.innerText = " show more";
    showMore.style.cursor = "pointer";
    commentText.innerText = truncatedText;
    commentText.appendChild(showMore);
    showMore.addEventListener("click", function () {
      commentText.innerText = text;
    });
  }
});
/******/ })()
;