// LikeButton.js
import axios from "axios";

export default class LikeShop {
    constructor(btnSelector) {
        this.likeButtons = btnSelector;
    }

    async handleButtonClick(likeBtn) {
        const shopId = likeBtn.getAttribute("data-shop-id");
        if (!shopId) {
            // ログインしていないときの処理
            const answer = confirm(
                "この機能を使うにはログインする必要があります。"
            );
            if (answer) {
                const currentUrl = window.location.href;
                const newUrl = currentUrl + "login";
                window.location.href = newUrl;
            }
            return;
        }

        const heartEl = likeBtn.firstElementChild;
        const isLiked = heartEl.classList.contains("is-not-liked")
            ? false
            : true;
        if (!isLiked) {
            // likeする
            heartEl.classList.toggle("is-not-liked");
            heartEl.classList.toggle("is-liked");
            try {
                await axios.post(`/likes/${shopId}`);
            } catch (error) {
                console.log(error);
            }
        } else {
            // unlikeする
            const answer = confirm("お気に入りから外してもいいですか？");
            if (answer) {
                heartEl.classList.toggle("is-not-liked");
                heartEl.classList.toggle("is-liked");
                try {
                    await axios.delete(`/likes/${shopId}`);
                } catch (error) {
                    console.log(error);
                }
            }
        }
    }

    init() {
        this.likeButtons.forEach((likeBtn) => {
            likeBtn.addEventListener("click", async (e) => {
                e.preventDefault();
                await this.handleButtonClick(likeBtn);
            });
        });
    }
}
