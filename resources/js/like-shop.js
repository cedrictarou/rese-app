// likeShop function
import axios from "axios";
// axios.defaults.headers.common["X-CSRF-TOKEN"] = document
//     .querySelector('meta[name="csrf-token"]')
//     .getAttribute("content");

const likeBtns = document.querySelectorAll(".like-btn");

likeBtns.forEach((likeBtn) => {
    likeBtn.addEventListener("click", async (e) => {
        e.preventDefault();
        const shopId = likeBtn.getAttribute("data-shop-id");
        if (!shopId) {
            // ログインしていないときの処理
            alert("この機能を使うにはログインする必要があります。");
            return;
        }

        const heartEl = likeBtn.firstElementChild;
        const isLiked = heartEl.classList.contains("text-secondary-light")
            ? false
            : true;
        if (!isLiked) {
            // likeする
            heartEl.classList.toggle("text-secondary-light");
            heartEl.classList.toggle("text-accent");
            try {
                await axios.post(`/likes/${shopId}`);
            } catch (error) {
                console.log(error);
            }
        } else {
            // unlikeする
            const answer = confirm("お気に入りから外してもいいですか？");
            if (answer) {
                heartEl.classList.toggle("text-secondary-light");
                heartEl.classList.toggle("text-accent");
                try {
                    await axios.delete(`/likes/${shopId}`);
                } catch (error) {
                    console.log(error);
                }
            }
        }
    });
});
