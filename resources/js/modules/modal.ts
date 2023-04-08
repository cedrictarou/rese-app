export default class Modal {
    private modal: HTMLElement;
    private modalOverlay: HTMLElement;
    private openModalBtn: HTMLElement;
    private closeModalBtn: HTMLElement;
    private duration: number;

    constructor(modal: HTMLElement, modalOverlay: HTMLElement, openModalBtn: HTMLElement, closeModalBtn: HTMLElement, duration = 300) {
        this.modal = modal;
        this.modalOverlay = modalOverlay;
        this.openModalBtn = openModalBtn;
        this.closeModalBtn = closeModalBtn;
        this.duration = duration;
    }

    public openModal(): void {
        this.modal.classList.remove("hidden");
        setTimeout(() => {
            this.modalOverlay.classList.remove("hidden");
            this.modal.classList.remove("opacity-0");
        }, this.duration);
    }

    public closeModal(): void {
        this.modal.classList.add("opacity-0");
        setTimeout(() => {
            this.modal.classList.add("hidden");
            this.modalOverlay.classList.add("hidden");
        }, this.duration);
    }

    public setModal(): void {
        this.openModalBtn.addEventListener("click", () => this.openModal());
        this.closeModalBtn.addEventListener("click", () => this.closeModal());
        this.modalOverlay.addEventListener("click", () => this.closeModal());
    }
}
