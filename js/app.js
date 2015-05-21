

$(document).ready(function(){

	$(".fitvid").fitVids();

	$(".elsewhere li").hover(

		function () {
		    $(".elsewhere li").addClass("hover");
		},

		function () {
			$(".elsewhere li").removeClass("hover");
		});


});
