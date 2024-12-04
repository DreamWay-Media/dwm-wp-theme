document.addEventListener( 'DOMContentLoaded', () => {
	const slideTrack = document.querySelector( '.logos-slide' );
	const logoItems = document.querySelectorAll( '.logo-item' );

	let totalLogos = logoItems.length; // Initial number of logos
	let isCloningRequired = true; // Flag to track cloning state

	// Clone logos dynamically (for initial cloning)
	function cloneLogos() {
		const containerWidth = slideTrack.offsetWidth;
		const logoWidth = logoItems[ 0 ].offsetWidth;

		// Calculate how many logos are needed to fill the container width
		const logosNeeded = Math.ceil( containerWidth / logoWidth );

		// Clone logos only if we haven't already cloned enough logos
		if ( logosNeeded > totalLogos && isCloningRequired ) {
			for ( let i = 0; i < logosNeeded - totalLogos + 10; i++ ) {
				logoItems.forEach( ( logo ) => {
					const clone = logo.cloneNode( true );
					slideTrack.appendChild( clone );
				} );
			}
			isCloningRequired = false; // Mark cloning as completed
			totalLogos = slideTrack.querySelectorAll( '.logo-item' ).length; // Update total number of logos after cloning
		}
	}

	// Trigger cloning initially
	cloneLogos();

	// Handle resize events to adjust for different viewport widths
	let resizeTimer;
	window.addEventListener( 'resize', () => {
		clearTimeout( resizeTimer );
		resizeTimer = setTimeout( () => {
			// Only recalculate and clone if necessary (don't reset the animation)
			cloneLogos();
		}, 250 );
	} );

	// Handle continuous appending of logos to maintain infinite scroll
	function appendClones() {
		const firstLogo = slideTrack.querySelector( '.logo-item' );
		if ( firstLogo ) {
			const clone = firstLogo.cloneNode( true );
			slideTrack.appendChild( clone );
		}
	}

	// Trigger continuous logo appending based on animation end
	slideTrack.addEventListener( 'animationiteration', () => {
		appendClones();
	} );
} );
