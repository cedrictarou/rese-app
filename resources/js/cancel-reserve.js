// cancel処理
const cancelBtns = document.querySelectorAll(".cancel-btn");

cancelBtns.forEach((cancelBtn) => {
    cancelBtn.addEventListener("click", (e) => {
        e.preventDefault();
        const answer = confirm("本当にキャンセルしてもよろしいですか？");
        const formEl = cancelBtn.closest("form");
        if (answer) {
            formEl.submit();
        }
    });
});
