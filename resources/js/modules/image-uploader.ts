export default class ImageUploader {
    private readonly imageInput: HTMLInputElement;
    private readonly imageBefore: HTMLImageElement;
    private readonly imageAfter: HTMLImageElement;

    constructor(imageInputId: string, imageBeforeId: string, imageAfterId: string) {
        this.imageInput = document.querySelector<HTMLInputElement>(`#${imageInputId}`)!;
        this.imageBefore = document.querySelector<HTMLImageElement>(`#${imageBeforeId}`)!;
        this.imageAfter = document.querySelector<HTMLImageElement>(`#${imageAfterId}`)!;

        this.imageInput.addEventListener("change", this.handleInputChange.bind(this));
    }

    private handleInputChange(event: Event) {
        const file = (event.target as HTMLInputElement).files?.[0];

        if (file) {
            const reader = new FileReader();
            reader.addEventListener("load", () => {
                if (typeof reader.result === "string" && reader.result.length > 0) {
                    this.imageAfter.src = reader.result;
                    // imgタグの表示の切り替え
                    this.imageBefore.classList.add('hidden');
                    this.imageAfter.classList.remove('hidden');
                }
            });

            reader.readAsDataURL(file);
        }
    }
}
