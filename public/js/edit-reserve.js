/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/accordion.ts":
/*!***********************************!*\
  !*** ./resources/js/accordion.ts ***!
  \***********************************/
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

/***/ "./resources/js/comment-truncator.ts":
/*!*******************************************!*\
  !*** ./resources/js/comment-truncator.ts ***!
  \*******************************************/
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

/***/ "./resources/js/modal.ts":
/*!*******************************!*\
  !*** ./resources/js/modal.ts ***!
  \*******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
var Modal = /** @class */function () {
  function Modal(modal, modalOverlay, openModalBtn, closeModalBtn, duration) {
    if (duration === void 0) {
      duration = 300;
    }
    this.modal = modal;
    this.modalOverlay = modalOverlay;
    this.openModalBtn = openModalBtn;
    this.closeModalBtn = closeModalBtn;
    this.duration = duration;
  }
  Modal.prototype.openModal = function () {
    var _this = this;
    this.modal.classList.remove("hidden");
    setTimeout(function () {
      _this.modalOverlay.classList.remove("hidden");
      _this.modal.classList.remove("opacity-0");
    }, this.duration);
  };
  Modal.prototype.closeModal = function () {
    var _this = this;
    this.modal.classList.add("opacity-0");
    setTimeout(function () {
      _this.modal.classList.add("hidden");
      _this.modalOverlay.classList.add("hidden");
    }, this.duration);
  };
  Modal.prototype.setModal = function () {
    var _this = this;
    this.openModalBtn.addEventListener("click", function () {
      return _this.openModal();
    });
    this.closeModalBtn.addEventListener("click", function () {
      return _this.closeModal();
    });
    this.modalOverlay.addEventListener("click", function () {
      return _this.closeModal();
    });
  };
  return Modal;
}();
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Modal);

/***/ }),

/***/ "./resources/js/reservation.ts":
/*!*************************************!*\
  !*** ./resources/js/reservation.ts ***!
  \*************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "setupDateInput": () => (/* binding */ setupDateInput),
/* harmony export */   "setupNumberInput": () => (/* binding */ setupNumberInput),
/* harmony export */   "setupTimeInput": () => (/* binding */ setupTimeInput)
/* harmony export */ });
var setupDateInput = function setupDateInput() {
  var dateInput = document.querySelector("#date");
  var confirmDate = document.querySelector("#confirm-date");
  dateInput.addEventListener("input", function () {
    if (confirmDate) {
      confirmDate.innerText = dateInput.value;
    }
  });
};
var setupTimeInput = function setupTimeInput() {
  var timeInput = document.querySelector("#time");
  var confirmTime = document.querySelector("#confirm-time");
  timeInput.addEventListener("input", function () {
    if (confirmTime) {
      confirmTime.innerText = timeInput.value;
    }
  });
};
var setupNumberInput = function setupNumberInput() {
  var numberInput = document.querySelector("#number");
  var confirmNumber = document.querySelector("#confirm-number");
  numberInput.addEventListener("input", function () {
    if (confirmNumber) {
      confirmNumber.innerText = numberInput.value + "人";
    }
  });
};

/***/ }),

/***/ "./resources/js/smooth-scroll.ts":
/*!***************************************!*\
  !*** ./resources/js/smooth-scroll.ts ***!
  \***************************************/
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
/*!**************************************!*\
  !*** ./resources/js/edit-reserve.ts ***!
  \**************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _accordion__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./accordion */ "./resources/js/accordion.ts");
/* harmony import */ var _comment_truncator__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./comment-truncator */ "./resources/js/comment-truncator.ts");
/* harmony import */ var _modal__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./modal */ "./resources/js/modal.ts");
/* harmony import */ var _reservation__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./reservation */ "./resources/js/reservation.ts");
/* harmony import */ var _smooth_scroll__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./smooth-scroll */ "./resources/js/smooth-scroll.ts");





// 予約フォームの入力値を確認画面に反映する処理
(0,_reservation__WEBPACK_IMPORTED_MODULE_3__.setupDateInput)();
(0,_reservation__WEBPACK_IMPORTED_MODULE_3__.setupTimeInput)();
(0,_reservation__WEBPACK_IMPORTED_MODULE_3__.setupNumberInput)();
// smooth scrolling
var triggerSelector = document.querySelectorAll('a[href^="#"]');
var smoothScroll = new _smooth_scroll__WEBPACK_IMPORTED_MODULE_4__["default"](triggerSelector);
smoothScroll.init();
// comment modal
var modal = document.querySelector("#modal");
var modalOverlay = document.querySelector("#modal-overlay");
var openModalBtn = document.querySelector("#open-modal");
var closeModalBtn = document.querySelector("#close-modal");
if (modal) {
  var commentModal = new _modal__WEBPACK_IMPORTED_MODULE_2__["default"](modal, modalOverlay, openModalBtn, closeModalBtn);
  commentModal.setModal();
}
// accordion
var showMoreBtn = document.querySelector("#show-more-button");
var hiddenContents = document.querySelectorAll("#reviews-container .hidden");
if (showMoreBtn) {
  var commentAccordion = new _accordion__WEBPACK_IMPORTED_MODULE_0__["default"](showMoreBtn, hiddenContents);
  commentAccordion.toggleShow();
}
// text truncator
var commentTextArray = document.querySelectorAll(".comment-text");
if (commentTextArray) {
  var commentTruncator = new _comment_truncator__WEBPACK_IMPORTED_MODULE_1__["default"](commentTextArray);
  commentTruncator.truncate();
}
})();

/******/ })()
;