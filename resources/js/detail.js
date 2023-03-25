// date
const dateInput = document.querySelector("#date");
const confirmDate = document.querySelector("#confirm-date");

dateInput.addEventListener("input", () => {
    confirmDate.innerText = dateInput.value;
});

// time
const timeInput = document.querySelector("#time");
const confirmTime = document.querySelector("#confirm-time");

timeInput.addEventListener("input", () => {
    confirmTime.innerText = timeInput.value;
});

// number of poeple
const numberInput = document.querySelector("#number");
const confirmNumber = document.querySelector("#confirm-number");

numberInput.addEventListener("input", () => {
    confirmNumber.innerText = numberInput.value + "人";
});

// show more
const commentTextArray = document.querySelectorAll(".comment-text");

commentTextArray.forEach((commentText) => {
    const text = commentText.innerText;
    if (text.length >= 100) {
        const truncatedText = text.slice(0, 100) + "...";
        const showMore = document.createElement("button");
        showMore.innerText = " show more";
        showMore.style.cursor = "pointer";

        commentText.innerText = truncatedText;
        commentText.appendChild(showMore);

        showMore.addEventListener("click", () => {
            commentText.innerText = text;
        });
    }
});
