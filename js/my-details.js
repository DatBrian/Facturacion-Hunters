import styles from "https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" assert { type: "css" };

export class myDetails extends HTMLElement {
    constructor() {
        super();
        this.container = null;
        this.plusButton = null;
        this.lessButton = null;
        this.input = null;
    }

    handleEvent(e) {
        let container = e.target.parentNode.parentNode.parentNode;
        let input = container.querySelector("#amount");

        e.target === this.plusButton && e.type === "click" ? this.plusAmount(input) :
            e.target === this.lessButton && e.type === "click" ? this.lessAmount(input, container) : undefined;
    }

    async components() {
        return await (await fetch("view/my-details.html")).text();
    }

    async connectedCallback() {
        document.adoptedStyleSheets.push(styles);
        await this.render();

        await this.addListeners(this.plusButton, this.lessButton);
    }

    async render() {
        let html = await this.components();
        this.innerHTML = html;

        this.plusButton = this.querySelector(".plusAmount");
        this.lessButton = this.querySelector(".lessAmount");
    }

    async addListeners(e1, e2) {
        e1.addEventListener("click", this);
        e2.addEventListener("click", this);
    }

    plusAmount(input) {
        input.value++;
    }

    lessAmount(input, container) {
        (input.value == 1 || input.value == 0) ? container.remove() : input.value--;
    }

}
customElements.define("my-details", myDetails);