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

// スムーススクロールを実行する関数
function smoothScroll(target, duration) {
  var targetElement = document.querySelector(target);
  var targetPosition = targetElement.getBoundingClientRect().top;
  var startPosition = window.pageYOffset;
  var distance = targetPosition - startPosition;
  var startTime = null;
  function animation(currentTime) {
    if (startTime === null) startTime = currentTime;
    var timeElapsed = currentTime - startTime;
    var run = ease(timeElapsed, startPosition, distance, duration);
    window.scrollTo(0, run);
    if (timeElapsed < duration) requestAnimationFrame(animation);
  }

  // イージング関数
  function ease(t, b, c, d) {
    t /= d / 2;
    if (t < 1) return c / 2 * t * t + b;
    t--;
    return -c / 2 * (t * (t - 2) - 1) + b;
  }
  requestAnimationFrame(animation);
}

// スムーススクロールをトリガーする要素を取得し、クリック時のイベントを設定する
var links = document.querySelectorAll('a[href^="#"]');
links.forEach(function (link) {
  link.addEventListener("click", function (e) {
    e.preventDefault();
    var target = this.getAttribute("href");
    smoothScroll(target, 1000);
  });
});
/******/ })()
;