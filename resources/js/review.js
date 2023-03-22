const openModalBtn = document.querySelector("#open-modal");
const modal = document.querySelector("#modal");
const closeModalBtn = document.querySelector("#close-modal");
const modalOverlay = document.querySelector("#modal-overlay");

const openAndCloseModal = () => {
    modal.classList.toggle("hidden");
    modalOverlay.classList.toggle("hidden");
};

openModalBtn.addEventListener("click", () => openAndCloseModal());
closeModalBtn.addEventListener("click", () => openAndCloseModal());
modalOverlay.addEventListener("click", () => openAndCloseModal());
