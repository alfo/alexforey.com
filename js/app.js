$(document).ready(function(){

	$('.slider').unslider({
		infinite: true,
		autoplay: true,
	});

	$(".fitvid").fitVids();

	$('.slider-with-caption').parent().addClass('contains-slider-with-caption');

	$('.video-exit').click(function(){
		$(".video-container").removeClass("playing");
		$(".video-exit").removeClass("playing");
		setTimeout(function (){
			location.reload();
		}, 1200);
	});


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
	$(".video-exit").addClass("playing");
}