$(document).ready(function(){

	$('.slider').unslider({
		infinite: true,
		autoplay: true,
		speed: 1000,
		delay: 4000
	});

	$(".fitvid").fitVids();

	$('.slider-with-caption').parent().addClass('contains-slider-with-caption');

	$(".slider").bind('swipeleft',function(event, ui){
		console.log("swipe");
	})

});
