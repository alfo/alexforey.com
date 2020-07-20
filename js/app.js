$(document).ready(function(){

	$('.slider').unslider({
		infinite: true
	});

	$(".fitvid").fitVids();

	$(".elsewhere li").hover(

		function () {
		    $(".elsewhere li").addClass("hover");
		},

		function () {
			$(".elsewhere li").removeClass("hover");
	});

	$('a#mail').on('click', function(){
		var href = $(this).attr('href');
		$(this).attr('href', href.replace('shitemail.', ''));
	});

	$('.slider-with-caption').parent().addClass('contains-slider-with-caption');


});
