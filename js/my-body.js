/**
 * todo: Brian del futuro arregle esto ▼
 */

import styles from "https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" assert { type: "css" };
export class myBody extends HTMLElement {
    constructor() {
        super();
    }

    handleEvent(e) {
        (e.type === "requestData") ? this.searchData() : undefined;
    }

    async components() {
        return await (await fetch("view/my-body.html")).text();
    }

    async connectedCallback() {
        document.adoptedStyleSheets.push(styles);
        await this.render();
        this.addEventListener("requestData", this);
    }

    async render() {
        let html = await this.components();
        this.innerHTML = html;

    }

    searchData() {

        //Primera sección

        let infoInputs = this.querySelectorAll("input");
        let infoInputsValues = this.groupInputs(infoInputs);
        console.log(infoInputsValues);

        //Segunda sección

        let products = this.searchDetails()
        console.log(products);

    }

    groupInputs(inputs) {
        let entries = Array.from(inputs).map(input => [input.name, input.value]);
        return Object.fromEntries(entries);
    }

    searchDetails() {
        let details = this.querySelector("#buttonsContainer");
        let formProducts = details.querySelectorAll("my-details");

        let products = [];

        formProducts.forEach(product => {

            let inputs = product.querySelectorAll("input");
            let inputsValues = this.groupInputs(inputs);

            products.push(inputsValues);

        });

        return products;
    }

}
customElements.define("my-body", myBody);