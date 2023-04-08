export default class SmoothScroll {
    private smoothScrollTrigger: NodeListOf<HTMLAnchorElement>;
    private gap: number;

    constructor(triggerSelector: NodeListOf<HTMLAnchorElement>, gap = 100) {
        this.smoothScrollTrigger = triggerSelector;
        this.gap = gap;
    }

    public init(): void {
        this.smoothScrollTrigger.forEach((trigger) => {
            trigger.addEventListener("click", (e) => {
                this.handleClick(e, trigger);
            });
        });
    }

    private handleClick(e: MouseEvent, trigger: HTMLAnchorElement): void {
        e.preventDefault();
        const href = trigger.getAttribute("href");
        const targetElement = document.getElementById(href!.replace("#", ""))!;
        const rect = targetElement.getBoundingClientRect().top;
        const offset = window.pageYOffset;
        const target = rect + offset - this.gap;
        window.scrollTo({
            top: target,
            behavior: "smooth",
        });
    }
}
