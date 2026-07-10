export function initTestimonials() {
    const slider = document.getElementById("testimonial-slider");
    const prevBtn = document.getElementById("testimonial-prev");
    const nextBtn = document.getElementById("testimonial-next");

    if (!slider) return;

    let autoSlide;
    let isAnimating = false;

    const getCardWidth = () => {
        const firstCard = slider.querySelector("[data-testimonial-card]");
        if (!firstCard) return slider.clientWidth;

        const gap = 24;
        return firstCard.offsetWidth + gap;
    };

    const goNext = () => {
        if (isAnimating) return;

        const scrollAmount = getCardWidth();
        const maxScrollLeft = slider.scrollWidth - slider.clientWidth;

        isAnimating = true;

        if (slider.scrollLeft + scrollAmount >= maxScrollLeft - 10) {
            slider.scrollTo({
                left: 0,
                behavior: "smooth",
            });
        } else {
            slider.scrollBy({
                left: scrollAmount,
                behavior: "smooth",
            });
        }

        setTimeout(() => {
            isAnimating = false;
        }, 700);
    };

    const goPrev = () => {
        if (isAnimating) return;

        const scrollAmount = getCardWidth();
        const maxScrollLeft = slider.scrollWidth - slider.clientWidth;

        isAnimating = true;

        if (slider.scrollLeft <= 10) {
            slider.scrollTo({
                left: maxScrollLeft,
                behavior: "smooth",
            });
        } else {
            slider.scrollBy({
                left: -scrollAmount,
                behavior: "smooth",
            });
        }

        setTimeout(() => {
            isAnimating = false;
        }, 700);
    };

    const startAutoSlide = () => {
        stopAutoSlide();
        autoSlide = setInterval(goNext, 3500);
    };

    const stopAutoSlide = () => {
        if (autoSlide) clearInterval(autoSlide);
    };

    nextBtn?.addEventListener("click", () => {
        goNext();
        startAutoSlide();
    });

    prevBtn?.addEventListener("click", () => {
        goPrev();
        startAutoSlide();
    });

    slider.addEventListener("mouseenter", stopAutoSlide);
    slider.addEventListener("mouseleave", startAutoSlide);
    slider.addEventListener("touchstart", stopAutoSlide, { passive: true });
    slider.addEventListener("touchend", startAutoSlide);

    startAutoSlide();
}