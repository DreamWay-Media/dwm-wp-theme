document.addEventListener('DOMContentLoaded', function () {
    // Function to toggle logo visibility and adjust layout
    function handleLogoVisibility() {
        const logoContainer = document.querySelector('.logo-container');
        const headerContainer = document.querySelector('.header-slider-wrap'); // Adjust this to your header's container if needed

        if (logoContainer) {
            if (window.innerWidth < 768) {
                logoContainer.style.display = 'none'; // Hide the logo
                if (headerContainer) {
                    headerContainer.classList.add('logo-hidden'); // Add a class for layout adjustment
                }
            } else {
                logoContainer.style.display = ''; // Show the logo (default display)
                if (headerContainer) {
                    headerContainer.classList.remove('logo-hidden'); // Remove the class
                }
            }
        }
    }

    // Run the function on page load
    handleLogoVisibility();

    // Run the function on window resize
    window.addEventListener('resize', handleLogoVisibility);
});
