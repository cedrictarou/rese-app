// // cancel処理
export default class CancelReserve {
    private cancelBtns: NodeListOf<HTMLButtonElement>;

    constructor(cancelBtns: NodeListOf<HTMLButtonElement>) {
        this.cancelBtns = cancelBtns;
    }

    public cancel(): void {
        this.cancelBtns.forEach((cancelBtn) => {
            cancelBtn.addEventListener("click", (e: MouseEvent) => {
                e.preventDefault();
                const answer = confirm("本当にキャンセルしてもよろしいですか？");
                const formEl = cancelBtn.closest("form");
                if (answer && formEl) {
                    formEl.submit();
                }
            });
        });
    }

}


