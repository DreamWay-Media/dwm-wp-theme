document.addEventListener('DOMContentLoaded', () => {
	const slideTrack = document.querySelector('.logos-slide');
	const logoItems = document.querySelectorAll('.logo-item');
	
	let totalLogos = logoItems.length;
	let clonedLogosCount = totalLogos;
  
	function cloneLogos() {
	  const containerWidth = slideTrack.offsetWidth;
	  const logoWidth = logoItems[ 0 ].offsetWidth;
	  const logosNeeded = Math.ceil(containerWidth / logoWidth);
  
	  if (logosNeeded > clonedLogosCount) {
			const logosToClone = logosNeeded - clonedLogosCount+5;
			for (let i = 0; i < logosToClone; i++) {
		  logoItems.forEach((logo) => {
					const clone = logo.cloneNode(true);
					slideTrack.appendChild(clone);
					clonedLogosCount++;
		  });
			}
	  }
	  else
	  {
		for (let i = 0; i < 5; i++) {
			logoItems.forEach((logo) => {
					  const clone = logo.cloneNode(true);
					  slideTrack.appendChild(clone);
					  clonedLogosCount++;
			});
			  }
	  }
	}
  
	cloneLogos();
  
	let resizeTimer;
	window.addEventListener('resize', () => {
	  clearTimeout(resizeTimer);
	  resizeTimer = setTimeout(() => {
		// Only re-clone if needed
		if (logosNeeded > clonedLogosCount) {
			cloneLogos();
		}
			
	  }, 200); // Throttle resizing events
	});
  
	function appendClones() {
	  const firstLogo = slideTrack.querySelector('.logo-item');
	  if (firstLogo && clonedLogosCount < totalLogos) {
			const clone = firstLogo.cloneNode(true);
			slideTrack.appendChild(clone);
			clonedLogosCount++;
	  }
	}
  
	slideTrack.addEventListener('animationiteration', () => {
	  appendClones();
	});
});
  