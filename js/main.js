$('document').ready(function(){
	$('#cargando').fadeOut(250);
	$('#slider').jcider({
		looping: true, // For looping
		visibleSlides: 1, // Visible no. of slides
		variableWidth: false, // For variable width
		variableHeight: true, // For variable height
		fading: false, // For fading/sliding effect
		easing: 'cubic-bezier(.694, .0482, .335, 1)', // For easing
		transitionDuration: 400, // Duration of slide transition
		autoplay: true, // Duh...
		slideDuration: 3000, // Duration between each slide change in autoplay
		controls: true, // For visibility of nav-arrows
		controlsWrapper: 'div.jcider-nav', // Element for nav wrapper
		controlsLeft: ['span.jcider-nav-left', ''], // Element for nav-left 
		controlsRight: ['span.jcider-nav-right', ''], // Element for nav-right
		pagination: true, // For visibility of pagination
		paginationWrapper: 'div.jcider-pagination', // Element for pagination wrapper
		paginationPoint: 'div.jcider-pagination-point' // Element for pagination points
	});
})