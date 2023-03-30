export default class Accordion {
    private showMoreBtn: HTMLButtonElement;
    private hiddenContents: NodeListOf<HTMLElement>;
    private duration: number;

    constructor(showMoreBtn: HTMLButtonElement, hiddenContents: NodeListOf<HTMLElement>, duration: number = 300) {
        this.showMoreBtn = showMoreBtn;
        this.hiddenContents = hiddenContents;
        this.duration = duration;
    }

    public toggleShow(): void {
        this.showMoreBtn.addEventListener("click", () => {
            this.hiddenContents.forEach((content) => {
                if (content.classList.contains("hidden")) {
                    // open the content
                    content.classList.remove("hidden");
                    setTimeout(() => {
                        content.classList.remove("opacity-0");
                        this.showMoreBtn.innerText = "Show less";
                    }, this.duration);
                } else {
                    // hide the content
                    content.classList.add("opacity-0");
                    setTimeout(() => {
                        content.classList.add("hidden");
                        this.showMoreBtn.innerText = "Show more";
                    }, this.duration);
                }
            });
        });
    }
}
