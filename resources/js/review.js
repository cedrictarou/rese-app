const openModalBtn = document.querySelector("#open-modal");
const modal = document.querySelector("#modal");
const closeModalBtn = document.querySelector("#close-modal");
const modalOverlay = document.querySelector("#modal-overlay");

const openModal = () => {
    modal.classList.remove("hidden");
    setTimeout(() => {
        modal.classList.remove("opacity-0");
        modalOverlay.classList.remove("hidden");
    }, 300); // durationと同じ値に合わせる
};

const closeModal = () => {
    modal.classList.add("opacity-0");
    setTimeout(() => {
        modal.classList.add("hidden");
        modalOverlay.classList.add("hidden");
    }, 300); // durationと同じ値に合わせる
};

openModalBtn.addEventListener("click", () => openModal());
closeModalBtn.addEventListener("click", () => closeModal());
modalOverlay.addEventListener("click", () => closeModal());
