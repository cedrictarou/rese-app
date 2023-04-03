const imageInput = document.querySelector<HTMLInputElement>("#image-input")!;
const imageBefore = document.querySelector<HTMLImageElement>("#image-before")!;
const imageAfter = document.querySelector<HTMLImageElement>("#image-after")!;

imageInput.addEventListener("change", (event: Event) => {
    const file = (event.target as HTMLInputElement).files?.[0];

    if (file) {
        const reader = new FileReader();
        reader.addEventListener("load", () => {
            if (typeof reader.result === "string" && reader.result.length > 0) {
                imageAfter.src = reader.result;
                // imgタグの表示の切り替え
                imageBefore.classList.add('hidden');
                imageAfter.classList.remove('hidden');
            }
        });

        reader.readAsDataURL(file);
    }
});
