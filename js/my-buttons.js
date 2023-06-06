import styles from "https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" assert { type: "css" };

export class myButtons extends HTMLElement {
    constructor() {
        super();
        this.container = null;
        this.addButton = null;
    }

    handleEvent(e) {
        if (e.target === this.addButton && e.type === "click") {
            this.addProduct()
        }
    }

    async components() {
        return await (await fetch("view/my-buttons.html")).text();
    }

    async connectedCallback() {

        document.adoptedStyleSheets.push(styles);
        await this.render();

        this.addButton.addEventListener("click", this);

    }

    async render() {
        let html = await this.components();
        this.innerHTML = html;

        this.container = this.querySelector("#containerProducts");
        this.addButton = this.querySelector("#addButton");
    }

    addProduct() {
        let newComponent = document.createElement("my-details");

        let count = this.container.childElementCount;

        newComponent.dataset.id = count;

        this.container.insertAdjacentHTML("beforeend", newComponent.outerHTML);
    }
}
customElements.define("my-buttons", myButtons);