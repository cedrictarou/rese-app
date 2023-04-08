export default class Drawer {
    private openBtn: HTMLElement;
    private closeBtn: HTMLElement;
    private element: HTMLElement;
    private animationClass: string;

    constructor(openBtn: HTMLElement, closeBtn: HTMLElement, element: HTMLElement, animationClass: string) {
        this.openBtn = openBtn;
        this.closeBtn = closeBtn;
        this.element = element;
        this.animationClass = animationClass;
    }

    public openDrawer(): void {
        this.openBtn.addEventListener("click", () => {
            this.element.classList.toggle(this.animationClass);
        });
    }

    public closeDrawer(): void {
        this.closeBtn.addEventListener("click", () => {
            this.element.classList.toggle(this.animationClass);
        });
    }

    public toggleDrawer(): void {
        this.openDrawer();
        this.closeDrawer();
    }
}
