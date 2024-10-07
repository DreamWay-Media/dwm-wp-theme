/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
(function() {
	const siteNavigation = document.getElementById('site-navigation');

	// Return early if the navigation doesn't exist.
	if (!siteNavigation) {
		return;
	}

	const button = siteNavigation.getElementsByTagName('button')[0];

	// Return early if the button doesn't exist.
	if (typeof button === 'undefined') {
		return;
	}

	const menu = siteNavigation.getElementsByTagName('ul')[0];

	// Hide menu toggle button if menu is empty and return early.
	if (typeof menu === 'undefined') {
		button.style.display = 'none';
		return;
	}

	// Ensure the menu has the proper class for styling.
	if (!menu.classList.contains('nav-menu')) {
		menu.classList.add('nav-menu');
	}

	// Toggle the .toggled class and the aria-expanded attribute when the button is clicked.
	button.addEventListener('click', () => {
		siteNavigation.classList.toggle('toggled');
		const expanded = button.getAttribute('aria-expanded') === 'true';
		button.setAttribute('aria-expanded', expanded ? 'false' : 'true');
	});

	// Close the navigation when clicking outside of it.
	document.addEventListener('click', (event) => {
		const isClickInside = siteNavigation.contains(event.target);
		if (!isClickInside) {
			siteNavigation.classList.remove('toggled');
			button.setAttribute('aria-expanded', 'false');
		}
	});
})();
