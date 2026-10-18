$(document).ready(function(){

	$('.slider').unslider({
		infinite: true,
		autoplay: true,
		delay: 5000,
		speed: 1000
	});

	$(".fitvid").fitVids();

	$('.slider-with-caption').parent().addClass('contains-slider-with-caption');

	initShowreel();

});

function initShowreel() {
	var container = $(".video-container");
	var iframe = container.find("iframe")[0];
	if (!iframe || typeof Vimeo === "undefined") return;

	var player = new Vimeo.Player(iframe);

	function show() {
		container.addClass("playing");
		$(".video-exit").addClass("playing");
	}

	// Starting playback from the click keeps it inside a user gesture, so
	// the browser allows sound and it never autoplays while hidden.
	function start() {
		if (container.hasClass("playing")) return;
		player.play().then(show).catch(function(){
			// Browser refused: reveal the player so the viewer can use Vimeo's own controls.
			show();
		});
	}

	container.on("click", start);
	container.find(".play-button").on("keydown", function(e){
		if (e.key === "Enter" || e.key === " ") { e.preventDefault(); start(); }
	});

	$(".video-exit").on("click", function(){
		container.removeClass("playing");
		$(".video-exit").removeClass("playing");
		setTimeout(function(){
			player.pause();
			player.setCurrentTime(0);
		}, 1000);
	});
}
