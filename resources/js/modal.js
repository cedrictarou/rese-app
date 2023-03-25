export default class Modal {
    constructor(
        modal,
        modalOverlay,
        openModalBtn,
        closeModalBtn,
        duration = 300
    ) {
        this.modal = modal;
        this.modalOverlay = modalOverlay;
        this.openModalBtn = openModalBtn;
        this.closeModalBtn = closeModalBtn;
        this.duration = duration;
    }
    openModal() {
        this.modal.classList.remove("hidden");
        setTimeout(() => {
            this.modal.classList.remove("opacity-0");
            this.modalOverlay.classList.remove("hidden");
        }, this.duration);
    }
    closeModal() {
        this.modal.classList.add("opacity-0");
        setTimeout(() => {
            this.modal.classList.add("hidden");
            this.modalOverlay.classList.add("hidden");
        }, this.duration);
    }
    setModal() {
        this.openModalBtn.addEventListener("click", () => this.openModal());
        this.closeModalBtn.addEventListener("click", () => this.closeModal());
        this.modalOverlay.addEventListener("click", () => this.closeModal());
    }
}

// const openModal = () => {
//     modal.classList.remove("hidden");
//     setTimeout(() => {
//         modal.classList.remove("opacity-0");
//         modalOverlay.classList.remove("hidden");
//     }, this.duration);
// };

// const closeModal = () => {
//     modal.classList.add("opacity-0");
//     setTimeout(() => {
//         modal.classList.add("hidden");
//         modalOverlay.classList.add("hidden");
//     }, this.duration);
// };
