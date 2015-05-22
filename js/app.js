

$(document).ready(function(){

	$(".fitvid").fitVids();

	$(".elsewhere li").hover(

		function () {
		    $(".elsewhere li").addClass("hover");
		},

		function () {
			$(".elsewhere li").removeClass("hover");
	});

	if ($('.scroll_to_portfolio').length) {

		$('#portfolio_link').click(function(e) {

			$('.scroll_to_portfolio').goTo();

			e.preventDefault();

		});

	}


});
