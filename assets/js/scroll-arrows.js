document.addEventListener('DOMContentLoaded', function () {
    const scrollDown = document.getElementById('scroll-down');
    const scrollUp = document.getElementById('scroll-up');
    const scrollThreshold = 200; // Adjust this value as needed

    // Function to toggle visibility of scroll arrows
    function toggleScrollArrows() {
        if (document.body.scrollHeight > window.innerHeight + scrollThreshold) {
            scrollDown.classList.add('visible');
        } else {
            scrollDown.classList.remove('visible');
        }

        if (window.scrollY > 0) {
            scrollUp.classList.add('visible');
        } else {
            scrollUp.classList.remove('visible');
        }

        if (window.scrollY + window.innerHeight >= document.body.scrollHeight - scrollThreshold) {
            scrollDown.classList.remove('visible');
        } else {
            scrollDown.classList.add('visible');
        }
    }

    // Scroll down on arrow click
    scrollDown.addEventListener('click', function () {
        window.scrollBy({
            top: window.innerHeight,
            left: 0,
            behavior: 'smooth'
        });
    });

    // Scroll up on arrow click
    scrollUp.addEventListener('click', function () {
        window.scrollTo({
            top: 0,
            left: 0,
            behavior: 'smooth'
        });
    });

    // Initial check
    toggleScrollArrows();
    window.addEventListener('resize', toggleScrollArrows);
    window.addEventListener('scroll', toggleScrollArrows);

    // Custom event listener for AJAX updates
    document.addEventListener('ajaxComplete', function () {
        setTimeout(toggleScrollArrows, 100); // Adjust delay if needed
    });
});
