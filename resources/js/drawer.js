// Drawer.js
export default class Drawer {
    constructor(openBtn, closeBtn, element, animationClass) {
        this.openBtn = openBtn;
        this.closeBtn = closeBtn;
        this.element = element;
        this.animationClass = animationClass;
    }
    openDrawer() {
        this.openBtn.addEventListener("click", () => {
            this.element.classList.toggle(this.animationClass);
        });
    }
    closeDrawer() {
        this.closeBtn.addEventListener("click", () => {
            this.element.classList.toggle(this.animationClass);
        });
    }
    toggleDrawer() {
        this.openDrawer();
        this.closeDrawer();
    }
}
