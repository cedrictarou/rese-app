import Drawer from "./drawer";
import FlashMessage from "./flash-message";

// navigation bar
const openBtn = document.querySelector<HTMLButtonElement>("#nav-btn")!;
const closeBtn = document.querySelector<HTMLButtonElement>("#nav-close")!;
const nav = document.querySelector<HTMLElement>("#nav")!;
const LeftToRight = "left-to-right";
const navDrawer = new Drawer(openBtn, closeBtn, nav, LeftToRight);
navDrawer.toggleDrawer();

// search bar
const searchBtn = document.querySelector<HTMLButtonElement>("#search-btn")!;
const overlay = document.querySelector<HTMLElement>("#overlay")!;
const searchBox = document.querySelector<HTMLElement>("#search-box")!;
const RightToLeft = "right-to-left";
if (searchBox) {
    const searchDrawer = new Drawer(searchBtn, overlay, searchBox, RightToLeft);
    searchDrawer.toggleDrawer();
}



// flash message
const flashMessage = document.querySelector<HTMLElement>("#flash-message");
if (flashMessage) {
    const message = new FlashMessage(flashMessage);
    message.flash();
}
