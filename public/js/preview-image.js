/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!***************************************!*\
  !*** ./resources/js/preview-image.ts ***!
  \***************************************/


var imageInput = document.querySelector("#image-input");
var imageBefore = document.querySelector("#image-before");
var imageAfter = document.querySelector("#image-after");
imageInput.addEventListener("change", function (event) {
  var _a;
  var file = (_a = event.target.files) === null || _a === void 0 ? void 0 : _a[0];
  if (file) {
    var reader_1 = new FileReader();
    reader_1.addEventListener("load", function () {
      if (typeof reader_1.result === "string" && reader_1.result.length > 0) {
        imageAfter.src = reader_1.result;
        // imgタグの表示の切り替え
        imageBefore.classList.add('hidden');
        imageAfter.classList.remove('hidden');
      }
    });
    reader_1.readAsDataURL(file);
  }
});
/******/ })()
;