const showMoreButton = document.getElementById("show-more-button");
const hiddenReviews = document.querySelectorAll("#reviews-container .hidden");

showMoreButton.addEventListener("click", () => {
    hiddenReviews.forEach((review) => {
        if (review.classList.contains("hidden")) {
            review.classList.remove("hidden");
            setTimeout(() => {
                review.classList.remove("opacity-0");
                showMoreButton.innerText = "Show less";
            }, 300);
        } else {
            review.classList.add("opacity-0");
            setTimeout(() => {
                review.classList.add("hidden");
                showMoreButton.innerText = "Show more";
            }, 300);
        }
    });
});
