export default class CommentTruncator {
    constructor(commentSelector, maxLength = 50) {
        this.comments = commentSelector;
        this.maxLength = maxLength;
    }

    truncate() {
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
