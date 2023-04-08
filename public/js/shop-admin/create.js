/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/modules/image-uploader.ts":
/*!************************************************!*\
  !*** ./resources/js/modules/image-uploader.ts ***!
  \************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
var ImageUploader = /** @class */function () {
  function ImageUploader(imageInputId, imageBeforeId, imageAfterId) {
    this.imageInput = document.querySelector("#".concat(imageInputId));
    this.imageBefore = document.querySelector("#".concat(imageBeforeId));
    this.imageAfter = document.querySelector("#".concat(imageAfterId));
    this.imageInput.addEventListener("change", this.handleInputChange.bind(this));
  }
  ImageUploader.prototype.handleInputChange = function (event) {
    var _this = this;
    var _a;
    var file = (_a = event.target.files) === null || _a === void 0 ? void 0 : _a[0];
    if (file) {
      var reader_1 = new FileReader();
      reader_1.addEventListener("load", function () {
        if (typeof reader_1.result === "string" && reader_1.result.length > 0) {
          _this.imageAfter.src = reader_1.result;
          // imgタグの表示の切り替え
          _this.imageBefore.classList.add('hidden');
          _this.imageAfter.classList.remove('hidden');
        }
      });
      reader_1.readAsDataURL(file);
    }
  };
  return ImageUploader;
}();
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (ImageUploader);

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!*******************************************!*\
  !*** ./resources/js/shop-admin/create.ts ***!
  \*******************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _modules_image_uploader__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../modules/image-uploader */ "./resources/js/modules/image-uploader.ts");

var imageUploader1 = new _modules_image_uploader__WEBPACK_IMPORTED_MODULE_0__["default"]("image-input", "image-before", "image-after");
})();

/******/ })()
;