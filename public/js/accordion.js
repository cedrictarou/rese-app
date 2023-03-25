/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***********************************!*\
  !*** ./resources/js/accordion.js ***!
  \***********************************/
var showMoreButton = document.getElementById("show-more-button");
var hiddenReviews = document.querySelectorAll("#reviews-container .hidden");
showMoreButton.addEventListener("click", function () {
  hiddenReviews.forEach(function (review) {
    if (review.classList.contains("hidden")) {
      review.classList.remove("hidden");
      setTimeout(function () {
        review.classList.remove("opacity-0");
        showMoreButton.innerText = "Show less";
      }, 300);
    } else {
      review.classList.add("opacity-0");
      setTimeout(function () {
        review.classList.add("hidden");
        showMoreButton.innerText = "Show more";
      }, 300);
    }
  });
});
/******/ })()
;