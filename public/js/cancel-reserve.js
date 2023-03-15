/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!****************************************!*\
  !*** ./resources/js/cancel-reserve.js ***!
  \****************************************/
// cancel処理
var cancelBtns = document.querySelectorAll(".cancel-btn");
cancelBtns.forEach(function (cancelBtn) {
  cancelBtn.addEventListener("click", function (e) {
    e.preventDefault();
    var answer = confirm("本当にキャンセルしてもよろしいですか？");
    var formEl = cancelBtn.closest("form");
    if (answer) {
      formEl.submit();
    }
  });
});
/******/ })()
;