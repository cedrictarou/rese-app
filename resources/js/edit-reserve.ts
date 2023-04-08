import Accordion from "./modules/accordion";
import CommentTruncator from "./modules/comment-truncator";
import Modal from "./modules/modal";
import { setupDateInput, setupTimeInput, setupNumberInput } from "./modules/reservation";
import SmoothScroll from "./modules/smooth-scroll";

// 予約フォームの入力値を確認画面に反映する処理
setupDateInput();
setupTimeInput();
setupNumberInput();

// smooth scrolling
const triggerSelector = document.querySelectorAll<HTMLAnchorElement>('a[href^="#"]');
const smoothScroll = new SmoothScroll(triggerSelector);
smoothScroll.init();

// comment modal
const modal = document.querySelector<HTMLElement>("#modal")!;
const modalOverlay = document.querySelector<HTMLElement>("#modal-overlay")!;
const openModalBtn = document.querySelector<HTMLButtonElement>("#open-modal")!;
const closeModalBtn = document.querySelector<HTMLButtonElement>("#close-modal")!;
if (modal) {
    const commentModal = new Modal(
        modal,
        modalOverlay,
        openModalBtn,
        closeModalBtn
    );
    commentModal.setModal();
}

// accordion
const showMoreBtn = document.querySelector<HTMLButtonElement>("#show-more-button");
const hiddenContents = document.querySelectorAll<HTMLElement>("#reviews-container .hidden");
if (showMoreBtn) {
    const commentAccordion = new Accordion(showMoreBtn, hiddenContents);
    commentAccordion.toggleShow();
}

// text truncator
const commentTextArray = document.querySelectorAll<HTMLElement>(".comment-text");
if (commentTextArray) {
    const commentTruncator = new CommentTruncator(commentTextArray);
    commentTruncator.truncate();
}
