import Accordion from "../modules/accordion";
import CommentTruncator from "../modules/comment-truncator";
import SmoothScroll from "../modules/smooth-scroll";


// smooth scrolling
const triggerSelector = document.querySelectorAll<HTMLAnchorElement>('a[href^="#"]');
const smoothScroll = new SmoothScroll(triggerSelector);
smoothScroll.init();

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
