export const setupDateInput = () => {
    const dateInput = document.querySelector<HTMLInputElement>("#date")!;
    const confirmDate = document.querySelector<HTMLSpanElement>("#confirm-date");

    dateInput.addEventListener("input", () => {
        if (confirmDate) {
            confirmDate.innerText = dateInput.value;
        }
    });
};

export const setupTimeInput = () => {
    const timeInput = document.querySelector<HTMLInputElement>("#time")!;
    const confirmTime = document.querySelector<HTMLSpanElement>("#confirm-time");

    timeInput.addEventListener("input", () => {
        if (confirmTime) {
            confirmTime.innerText = timeInput.value;
        }
    });
};

export const setupNumberInput = () => {
    const numberInput = document.querySelector<HTMLInputElement>("#number")!;
    const confirmNumber = document.querySelector<HTMLSpanElement>("#confirm-number");

    numberInput.addEventListener("input", () => {
        if (confirmNumber) {
            confirmNumber.innerText = numberInput.value + "人";
        }
    });
};
