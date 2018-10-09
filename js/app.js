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

	if ($('.scroll_to_portfolio').length) {

		$('#portfolio_link').click(function(e) {

			$('.scroll_to_portfolio').goTo();

			e.preventDefault();

		});

	}

	$('.slider-with-caption').parent().addClass('contains-slider-with-caption');


});
