document.addEventListener('DOMContentLoaded', () => {
	const logoScroll = document.querySelector('.logos-slide');
	
	
	// Ensure smooth animation after window resize
	let resizeTimer;
	window.addEventListener('resize', () => {
	  clearTimeout(resizeTimer);
	  logoScroll.style.animationPlayState = 'paused';
	  
	  resizeTimer = setTimeout(() => {
		logoScroll.style.animationPlayState = 'running';
	  }, 100);
	});
  });
