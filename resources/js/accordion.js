export default class Accordion {
    constructor(showMoreBtn, hiddenContents, duration = 300) {
        this.showMoreBtn = showMoreBtn;
        this.hiddenContents = hiddenContents;
        this.duration = duration;
    }

    toggleShow() {
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
                    // hidde the content
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
