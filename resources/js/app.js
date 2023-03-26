import "./bootstrap";
import SmoothScroll from "./smooth-scroll";
import Drawer from "./drawer";
import Modal from "./modal";
import Accordion from "./accordion";
import CommentTruncator from "./comment-truncator";
import LikeShop from "./like-shop";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

// navigation bar
const openBtn = document.querySelector("#nav-btn");
const closeBtn = document.querySelector("#nav-close");
const nav = document.querySelector("#nav");
const LeftToRight = "left-to-right";
const navDrawer = new Drawer(openBtn, closeBtn, nav, LeftToRight);
navDrawer.toggleDrawer();

// search bar
const searchBtn = document.querySelector("#search-btn");
const overlay = document.querySelector("#overlay");
const searchBox = document.querySelector("#search-box");
const RightToLeft = "right-to-left";
if (searchBox) {
    const searchDrawer = new Drawer(searchBtn, overlay, searchBox, RightToLeft);
    searchDrawer.toggleDrawer();
}

// smooth scrolling
const triggerSelector = document.querySelectorAll('a[href^="#"]');
const smoothScroll = new SmoothScroll(triggerSelector);
smoothScroll.init();

// commnet modal
const modal = document.querySelector("#modal");
const modalOverlay = document.querySelector("#modal-overlay");
const openModalBtn = document.querySelector("#open-modal");
const closeModalBtn = document.querySelector("#close-modal");
if (modal) {
    const commnetModal = new Modal(
        modal,
        modalOverlay,
        openModalBtn,
        closeModalBtn
    );
    commnetModal.setModal();
}

// accordion
const showMoreBtn = document.querySelector("#show-more-button");
const hiddenContents = document.querySelectorAll("#reviews-container .hidden");
if (showMoreBtn) {
    const commentAccordion = new Accordion(showMoreBtn, hiddenContents);
    commentAccordion.toggleShow();
}

// text trancator
const commentTextArray = document.querySelectorAll(".comment-text");
if (commentTextArray) {
    const commentTruncator = new CommentTruncator(commentTextArray);
    commentTruncator.truncate();
}

// like shop
const likeButtons = document.querySelectorAll(".like-btn");
if (likeButtons) {
    const likeShop = new LikeShop(likeButtons);
    likeShop.init();
}
