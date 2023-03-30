import CancelReserve from "./cancel-reserve";
import LikeShop from "./like-shop";

// cancel処理
const cancelBtns = document.querySelectorAll<HTMLButtonElement>(".cancel-btn")!;
const cancelReserve = new CancelReserve(cancelBtns);
cancelReserve.cancel();

// like shop
const likeButtons = document.querySelectorAll<HTMLButtonElement>(".like-btn")!;
const likeShop = new LikeShop(likeButtons);
likeShop.init();
