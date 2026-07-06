import { CountUp } from "countup.js";

document.addEventListener("DOMContentLoaded", () => {

    document.querySelectorAll(".counter").forEach(el => {

        const value = Number(el.dataset.value);

        const counter = new CountUp(el, value, {
            duration: 2,
            separator: ".",
        });

        if (!counter.error) {
            counter.start();
        }

    });

});