$(document).ready(function(){

	$('.slider').unslider({
		infinite: true,
		autoplay: true,
	});

	$(".fitvid").fitVids();

	$('.slider-with-caption').parent().addClass('contains-slider-with-caption');

});

var monitor = setInterval(function(){
	var elem = document.activeElement;
	
	if(elem && elem.tagName == 'IFRAME'){
		playVideo();
		clearInterval(monitor);
	}

}, 100);

function playVideo() {
	$(".video-container").addClass("playing");
}