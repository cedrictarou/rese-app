/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/modules/accordion.ts":
/*!*******************************************!*\
  !*** ./resources/js/modules/accordion.ts ***!
  \*******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
var Accordion = /** @class */function () {
  function Accordion(showMoreBtn, hiddenContents, duration) {
    if (duration === void 0) {
      duration = 300;
    }
    this.showMoreBtn = showMoreBtn;
    this.hiddenContents = hiddenContents;
    this.duration = duration;
  }
  Accordion.prototype.toggleShow = function () {
    var _this = this;
    this.showMoreBtn.addEventListener("click", function () {
      _this.hiddenContents.forEach(function (content) {
        if (content.classList.contains("hidden")) {
          // open the content
          content.classList.remove("hidden");
          setTimeout(function () {
            content.classList.remove("opacity-0");
            _this.showMoreBtn.innerText = "Show less";
          }, _this.duration);
        } else {
          // hide the content
          content.classList.add("opacity-0");
          setTimeout(function () {
            content.classList.add("hidden");
            _this.showMoreBtn.innerText = "Show more";
          }, _this.duration);
        }
      });
    });
  };
  return Accordion;
}();
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Accordion);

/***/ }),

/***/ "./resources/js/modules/comment-truncator.ts":
/*!***************************************************!*\
  !*** ./resources/js/modules/comment-truncator.ts ***!
  \***************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
var CommentTruncator = /** @class */function () {
  function CommentTruncator(commentSelector, maxLength) {
    if (maxLength === void 0) {
      maxLength = 50;
    }
    this.comments = commentSelector;
    this.maxLength = maxLength;
  }
  CommentTruncator.prototype.truncate = function () {
    var _this = this;
    this.comments.forEach(function (comment) {
      var text = comment.innerText;
      if (text.length >= _this.maxLength) {
        var truncatedText = text.slice(0, _this.maxLength) + "...";
        var showMore = document.createElement("button");
        showMore.innerText = " show more";
        showMore.style.cursor = "pointer";
        comment.innerText = truncatedText;
        comment.appendChild(showMore);
        showMore.addEventListener("click", function () {
          comment.innerText = text;
        });
      }
    });
  };
  return CommentTruncator;
}();
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (CommentTruncator);

/***/ }),

/***/ "./resources/js/modules/smooth-scroll.ts":
/*!***********************************************!*\
  !*** ./resources/js/modules/smooth-scroll.ts ***!
  \***********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
var SmoothScroll = /** @class */function () {
  function SmoothScroll(triggerSelector, gap) {
    if (gap === void 0) {
      gap = 100;
    }
    this.smoothScrollTrigger = triggerSelector;
    this.gap = gap;
  }
  SmoothScroll.prototype.init = function () {
    var _this = this;
    this.smoothScrollTrigger.forEach(function (trigger) {
      trigger.addEventListener("click", function (e) {
        _this.handleClick(e, trigger);
      });
    });
  };
  SmoothScroll.prototype.handleClick = function (e, trigger) {
    e.preventDefault();
    var href = trigger.getAttribute("href");
    var targetElement = document.getElementById(href.replace("#", ""));
    var rect = targetElement.getBoundingClientRect().top;
    var offset = window.pageYOffset;
    var target = rect + offset - this.gap;
    window.scrollTo({
      top: target,
      behavior: "smooth"
    });
  };
  return SmoothScroll;
}();
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (SmoothScroll);

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
/*!*****************************************!*\
  !*** ./resources/js/shop-admin/show.ts ***!
  \*****************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _modules_accordion__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../modules/accordion */ "./resources/js/modules/accordion.ts");
/* harmony import */ var _modules_comment_truncator__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../modules/comment-truncator */ "./resources/js/modules/comment-truncator.ts");
/* harmony import */ var _modules_smooth_scroll__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../modules/smooth-scroll */ "./resources/js/modules/smooth-scroll.ts");



// smooth scrolling
var triggerSelector = document.querySelectorAll('a[href^="#"]');
var smoothScroll = new _modules_smooth_scroll__WEBPACK_IMPORTED_MODULE_2__["default"](triggerSelector);
smoothScroll.init();
// accordion
var showMoreBtn = document.querySelector("#show-more-button");
var hiddenContents = document.querySelectorAll("#reviews-container .hidden");
if (showMoreBtn) {
  var commentAccordion = new _modules_accordion__WEBPACK_IMPORTED_MODULE_0__["default"](showMoreBtn, hiddenContents);
  commentAccordion.toggleShow();
}
// text truncator
var commentTextArray = document.querySelectorAll(".comment-text");
if (commentTextArray) {
  var commentTruncator = new _modules_comment_truncator__WEBPACK_IMPORTED_MODULE_1__["default"](commentTextArray);
  commentTruncator.truncate();
}
})();

/******/ })()
;