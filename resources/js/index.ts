import LikeShop from "./modules/like-shop";

// like shop
const likeButtons = document.querySelectorAll<HTMLButtonElement>(".like-btn")!;
const likeShop = new LikeShop(likeButtons);
likeShop.init();
