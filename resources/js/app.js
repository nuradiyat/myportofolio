import Alpine from "alpinejs";
import AOS from "aos";
import "aos/dist/aos.css";

import { initTestimonials } from "./testimonials";

window.Alpine = Alpine;

document.addEventListener("DOMContentLoaded", () => {
    Alpine.start();

    AOS.init({
        once: true,
        duration: 800,
        offset: 120,
    });

    initTestimonials();
});