export default class FlashMessage {
    private element: HTMLElement;
    private duration: number;

    constructor(element: HTMLElement, duration: number = 5000) {
        this.element = element;
        this.duration = duration;
    }
    flash() {
        setTimeout(() => {
            this.element.style.display = 'none';
        }, this.duration)
    }
}
