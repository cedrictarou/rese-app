// smoth scrolling
export default class SmoothScroll {
    constructor(triggerSelector, gap = 100) {
        this.smoothScrollTrigger = triggerSelector;
        this.gap = gap;
    }
    init() {
        this.smoothScrollTrigger.forEach((trigger) => {
            trigger.addEventListener("click", (e) => {
                this.handleClick(e, trigger);
            });
        });
    }
    handleClick(e, trigger) {
        e.preventDefault();
        const href = trigger.getAttribute("href");
        const targetElement = document.getElementById(href.replace("#", ""));
        const rect = targetElement.getBoundingClientRect().top;
        const offset = window.pageYOffset;
        const target = rect + offset - this.gap;
        window.scrollTo({
            top: target,
            behavior: "smooth",
        });
    }
}
