document.addEventListener('DOMContentLoaded', function () {
    const svgElements = document.querySelectorAll(".parallax-svg");
    let starLocation = [];
    let visibleStars = new Set();
    let lastScrollTop = 0;
    const scale = 0.05;

    function handlestarLocation() {
        starLocation = Array.from(svgElements).map(
            (svgElement) => svgElement.getBoundingClientRect().top + window.pageYOffset
        );
    }

    handlestarLocation();

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                visibleStars.add(entry.target);
            } else {
                visibleStars.delete(entry.target);
            }
        });
    }, { threshold: 0.1 });

    svgElements.forEach(svgElement => observer.observe(svgElement));

    const onScroll = (currentScrollPosition) => {
        visibleStars.forEach((star) => {
            const index = Array.from(svgElements).indexOf(star);
            const initialPosition = starLocation[index];
            const movement = currentScrollPosition - initialPosition;
            const speed = Math.round(movement * scale);
            star.style.transform = `translateY(${speed}px)`;
        });
    };

    let isScrolling = false;
    const handleScroll = () => {
        if (!isScrolling) {
            isScrolling = true;
            requestAnimationFrame(() => {
                const currentScrollTop = Math.floor(window.pageYOffset || document.documentElement.scrollTop);
                if (currentScrollTop !== lastScrollTop) {
                    onScroll(currentScrollTop);
                    lastScrollTop = currentScrollTop;
                }
                isScrolling = false;
            });
        }
    };

    window.addEventListener('resize', handlestarLocation);
    window.addEventListener('scroll', handleScroll);
});
