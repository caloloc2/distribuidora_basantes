var acciones = false;
var isMobile = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i);
    },
    any: function() {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
};

$('document').ready(function(){
	//initMap();
	$('#cargando').fadeOut(850);
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

	$('#marcas').jcider({
		looping: true, // For looping
		visibleSlides: 1, // Visible no. of slides
		variableWidth: false, // For variable width
		variableHeight: true, // For variable height
		fading: true, // For fading/sliding effect
		easing: 'cubic-bezier(.694, .0482, .335, 1)', // For easing
		transitionDuration: 400, // Duration of slide transition
		autoplay: true, // Duh...
		slideDuration: 3000, // Duration between each slide change in autoplay
		controls: false, // For visibility of nav-arrows
		pagination: false, // For visibility of pagination
	});


	/*var ua = navigator.userAgent.toLowerCase();
	var isAndroid = ua.indexOf("android") > -1; //&& ua.indexOf("mobile");
	if(isAndroid) {
	  // Do something!
	  // Redirect to Android-site?
	  alert('Android');
	  console.log(isAndroid.)
	}*/
	if(isMobile.Android()) {
	  console.log('Esto es un dispositivo Android');
	  $("#localizar").attr("href", "geo:-0.216904,-78.514287")
	}

	if(isMobile.iOS()) {
	  console.log('Esto es un dispositivo iOS');
	}
	if(isMobile.Windows()) {
	  alert('es windows');
	}
})

$('#acciones').click(function(){
	if (acciones){
		$('#menu_acciones').fadeOut(150);
		acciones = false;
	}else{
		$('#menu_acciones').fadeIn(150);
		acciones = true;
	}
})

function Destacados(){
	$('html, body').animate({scrollTop:700}, 'slow');
}

function Inicio(){
	$('html, body').animate({scrollTop:0}, 'slow');
}

function Mapa(){
	$('html, body').animate({scrollTop:1798}, 'slow');
}