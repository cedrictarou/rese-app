export default class CommentTruncator {
    private comments: NodeListOf<HTMLElement>;
    private maxLength: number;

    constructor(commentSelector: NodeListOf<HTMLElement>, maxLength: number = 50) {
        this.comments = commentSelector;
        this.maxLength = maxLength;
    }

    public truncate(): void {
        this.comments.forEach((comment) => {
            const text = comment.innerText;
            if (text.length >= this.maxLength) {
                const truncatedText = text.slice(0, this.maxLength) + "...";
                const showMore = document.createElement("button");
                showMore.innerText = " show more";
                showMore.style.cursor = "pointer";

                comment.innerText = truncatedText;
                comment.appendChild(showMore);

                showMore.addEventListener("click", () => {
                    comment.innerText = text;
                });
            }
        });
    }
}
