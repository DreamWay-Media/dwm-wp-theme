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

	// Get all the link elements within the menu.
	const links = menu.getElementsByTagName('a');

	// Get all the link elements with children within the menu.
	const linksWithChildren = menu.querySelectorAll('.menu-item-has-children > a, .page_item_has_children > a');

	// Toggle focus class on menu links when focused or blurred.
	for (const link of links) {
		link.addEventListener('focus', toggleFocus, true);
		link.addEventListener('blur', toggleFocus, true);
	}

	// Toggle focus on touch events for links with children.
	for (const link of linksWithChildren) {
		link.addEventListener('touchstart', toggleFocus, false);
	}

	/**
	 * Toggles the .focus class on an element.
	 */
	function toggleFocus(event) {
		let element = this;

		// For focus and blur events.
		if (event.type === 'focus' || event.type === 'blur') {
			// Traverse the DOM until reaching the nav-menu and toggle .focus on li elements.
			while (!element.classList.contains('nav-menu')) {
				if (element.tagName.toLowerCase() === 'li') {
					element.classList.toggle('focus');
				}
				element = element.parentNode;
			}
		}

		// For touchstart events.
		if (event.type === 'touchstart') {
			const menuItem = this.parentNode;
			event.preventDefault();

			// Remove focus from all other sibling items.
			for (const sibling of menuItem.parentNode.children) {
				if (menuItem !== sibling) {
					sibling.classList.remove('focus');
				}
			}
			menuItem.classList.toggle('focus');
		}
	}
})();
