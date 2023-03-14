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
        const iconEl = likeBtn.firstElementChild;
        iconEl.classList.toggle("text-gray-300");
        iconEl.classList.toggle("text-accent");

        try {
            const result = await axios.post(`/likes/${shopId}`);
            console.log(result);
        } catch (error) {
            console.log(error);
        }
    });
});
