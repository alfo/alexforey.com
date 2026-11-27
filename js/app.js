// The nav underline slide lives in includes/nav.php, so that it can run before the page paints

var reducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
var easing = "cubic-bezier(.2,.7,.2,1)";

document.addEventListener("DOMContentLoaded", function(){

	initFadeIn();
	initCarousels();
	initShowreel();
	initQuotes();
	initPhotoViewer();
	initCreditsFilter();
	initEmail();

});

function findAll(selector, parent) {
	return [].slice.call((parent || document).querySelectorAll(selector));
}

// Anything marked data-in drifts into focus the first time it is seen
function initFadeIn() {
	if (reducedMotion || !window.IntersectionObserver || !document.body.animate) return;

	var count = 0;
	var timer = null;

	function fadeIn(element) {
		// Things that arrive together come in one after another
		var delay = Math.min(count++, 8) * 70;
		clearTimeout(timer);
		timer = setTimeout(function(){ count = 0; }, 120);

		element.style.opacity = "";
		element.animate([
			{ opacity: 0, transform: "translateY(26px)", filter: "blur(10px)" },
			{ opacity: 1, transform: "translateY(0)", filter: "blur(0)" }
		], { duration: 750, delay: delay, easing: easing, fill: "backwards" });

		// The red underline draws itself from the left
		var underlines = findAll(".underline", element);
		if (element.classList.contains("underline")) underlines.push(element);

		underlines.forEach(function(underline){
			underline.animate([
				{ transform: "scaleX(0)" },
				{ transform: "scaleX(1)" }
			], { duration: 800, delay: delay + 200, easing: easing, fill: "backwards", pseudoElement: "::after" });
		});
	}

	var observer = new IntersectionObserver(function(entries){
		entries.forEach(function(entry){
			if (!entry.isIntersecting) return;
			observer.unobserve(entry.target);
			fadeIn(entry.target);
		});
	}, { rootMargin: "0px 0px -5% 0px" });

	findAll("[data-in]").forEach(function(element){
		// Hidden until it plays, so that nothing flashes at full strength first
		element.style.opacity = 0;
		observer.observe(element);
	});
}

// Home: the carousels slow down under the pointer
function initCarousels() {
	findAll(".carousel").forEach(function(carousel){
		var track = carousel.querySelector(".carousel-track");
		if (!track || !track.getAnimations) return;

		var target = 1;
		var frame = null;

		function step() {
			frame = null;
			var animation = track.getAnimations()[0];
			if (!animation) return;

			var rate = animation.playbackRate + (target - animation.playbackRate) * 0.08;
			if (Math.abs(target - rate) < 0.005) {
				animation.playbackRate = target;
				return;
			}
			animation.playbackRate = rate;
			frame = requestAnimationFrame(step);
		}

		function setSpeed(speed) {
			target = speed;
			if (!frame) frame = requestAnimationFrame(step);
		}

		carousel.addEventListener("mouseenter", function(){ setSpeed(0.25); });
		carousel.addEventListener("mouseleave", function(){ setSpeed(1); });
		carousel.addEventListener("focusin", function(){ setSpeed(0.25); });
		carousel.addEventListener("focusout", function(){ setSpeed(1); });
	});
}

// Home: the showreel plays inside the hero
function initShowreel() {
	var container = document.querySelector(".video-container");
	var button = document.querySelector(".play-button");
	if (!container || !button) return;

	var progress = container.querySelector(".video-progress");
	var overlay = document.querySelector(".video-overlay");
	var scrollCue = document.querySelector(".scroll-cue");
	var vimeo = "https://player.vimeo.com";
	var iframe = null;
	var timers = [];
	var ready = false;
	var playing = false;

	function send(message) {
		if (iframe && iframe.contentWindow) iframe.contentWindow.postMessage(JSON.stringify(message), vimeo);
	}

	function listen() {
		send({ method: "addEventListener", value: "timeupdate" });
		send({ method: "addEventListener", value: "ended" });
	}

	function unmute() {
		send({ method: "setMuted", value: false });
		send({ method: "setVolume", value: 1 });
	}

	function addPlayer(autoplay) {
		iframe = document.createElement("iframe");
		iframe.title = "Alex Forey showreel";
		iframe.allow = "autoplay; fullscreen";
		iframe.setAttribute("playsinline", "");
		iframe.src = vimeo + "/video/" + encodeURIComponent(container.getAttribute("data-video")) +
			"?autoplay=" + (autoplay ? 1 : 0) + "&muted=0&controls=0&playsinline=1&title=0&byline=0&portrait=0&badge=0&dnt=1&api=1";
		container.insertBefore(iframe, container.firstChild);
	}

	function show() {
		playing = true;

		// Starting playback from the click keeps it inside a user gesture, so
		// the browser allows sound. A phone is strict about this.
		if (iframe && ready) {
			unmute();
			send({ method: "play" });
		} else {
			// Clicked before the player was ready: start again with one that plays as it loads
			if (iframe && iframe.parentNode) iframe.parentNode.removeChild(iframe);
			ready = false;
			addPlayer(true);
		}

		progress.style.transform = "scaleX(0)";
		container.classList.add("playing");
		container.setAttribute("aria-hidden", "false");
		button.classList.add("playing");
		button.setAttribute("aria-label", "Close Showreel");
		button.setAttribute("aria-pressed", "true");
		if (overlay) overlay.classList.add("playing");
		if (scrollCue) scrollCue.classList.add("playing");

		// The player says "ready" once, so ask again a few times in case that was missed
		timers = [600, 1500, 3000, 6000].map(function(delay){
			return setTimeout(listen, delay);
		});
	}

	function hide() {
		timers.forEach(clearTimeout);
		timers = [];
		playing = false;
		send({ method: "pause" });

		container.classList.remove("playing");
		container.setAttribute("aria-hidden", "true");
		button.classList.remove("playing");
		button.setAttribute("aria-label", "Play Showreel");
		button.setAttribute("aria-pressed", "false");
		if (overlay) overlay.classList.remove("playing");
		if (scrollCue) scrollCue.classList.remove("playing");

		// Back to the start once the video has faded out
		setTimeout(function(){
			if (playing) return;
			send({ method: "setCurrentTime", value: 0 });
			progress.style.transform = "scaleX(0)";
		}, 800);
	}

	// The player is loaded quietly once the page has settled, so that it can start straight from the click
	function preload() {
		setTimeout(function(){
			if (!iframe) addPlayer(false);
		}, 1200);
	}

	if (document.readyState == "complete") {
		preload();
	} else {
		window.addEventListener("load", preload);
	}

	button.addEventListener("click", function(){
		if (playing) {
			hide();
		} else {
			show();
		}
	});

	document.addEventListener("keydown", function(e){
		if (e.key == "Escape" && playing) hide();
	});

	window.addEventListener("message", function(e){
		if (e.origin !== vimeo || !iframe || e.source !== iframe.contentWindow) return;

		var data = e.data;
		if (typeof data == "string") {
			try {
				data = JSON.parse(data);
			} catch (err) {
				return;
			}
		}
		if (!data) return;

		var name = data.event || data.method;

		if (name == "ready") {
			ready = true;
			listen();
			if (playing) unmute();
		} else if (!playing) {
			return;
		} else if ((name == "timeupdate" || name == "playProgress") && data.data && data.data.percent != null) {
			progress.style.transform = "scaleX(" + Math.max(0, Math.min(1, data.data.percent)) + ")";
		} else if (name == "ended" || name == "finish") {
			hide();
		}
	});

	if (scrollCue) {
		scrollCue.addEventListener("click", function(){
			var selectedWork = document.querySelector(".selected-work");
			if (selectedWork) selectedWork.scrollIntoView({ behavior: reducedMotion ? "auto" : "smooth", block: "start" });
		});
	}
}

// Home: the press quotes take turns
function initQuotes() {
	var container = document.querySelector(".quotes");
	if (!container) return;

	var quotes = JSON.parse(container.getAttribute("data-quotes"));
	var dots = findAll(".quote-dots button", container);
	var text = container.querySelector("blockquote");
	var source = container.querySelector(".source");
	var show = container.querySelector(".show");
	var current = 0;
	var paused = false;
	var timer = null;

	function update() {
		text.textContent = quotes[current].text;
		source.textContent = quotes[current].source;
		show.textContent = quotes[current].show;
		dots.forEach(function(dot, index){
			dot.setAttribute("aria-pressed", index == current ? "true" : "false");
		});
	}

	function showQuote(index) {
		if (index == current) return;
		current = index;
		clearTimeout(timer);

		if (reducedMotion) {
			update();
			return;
		}

		// Fade out, swap the words, fade back in
		container.classList.add("swapping");
		timer = setTimeout(function(){
			update();
			container.classList.remove("swapping");
		}, 500);
	}

	dots.forEach(function(dot, index){
		dot.addEventListener("click", function(){ showQuote(index); });
	});

	// The quotes wait while one is being read
	container.addEventListener("mouseenter", function(){ paused = true; });
	container.addEventListener("mouseleave", function(){ paused = false; });
	container.addEventListener("focusin", function(){ paused = true; });
	container.addEventListener("focusout", function(){ paused = false; });

	if (quotes.length > 1) {
		setInterval(function(){
			if (!paused && !document.hidden) showQuote((current + 1) % quotes.length);
		}, 7000);
	}
}

// Project page: the photo viewer
function initPhotoViewer() {
	var viewer = document.querySelector(".photo-viewer");
	if (!viewer) return;

	var photos = JSON.parse(viewer.getAttribute("data-photos"));
	var image = viewer.querySelector("img");
	var count = viewer.querySelector(".photo-count");
	var thumbnails = findAll(".thumbnail");
	var current = 0;

	function showPhoto(index) {
		current = (index + photos.length) % photos.length;
		image.src = photos[current];
		if (count) count.textContent = (current + 1) + " / " + photos.length;

		thumbnails.forEach(function(thumbnail, i){
			thumbnail.classList.toggle("current", i == current);
			thumbnail.setAttribute("aria-pressed", i == current ? "true" : "false");
		});

		// Keep the current thumbnail in the middle of the strip
		var thumbnail = thumbnails[current];
		if (thumbnail) {
			var strip = thumbnail.parentNode;
			strip.scrollTo({ left: thumbnail.offsetLeft - (strip.clientWidth - thumbnail.offsetWidth) / 2, behavior: reducedMotion ? "auto" : "smooth" });
		}

		// Have the next photo ready
		var next = new Image();
		next.src = photos[(current + 1) % photos.length];
	}

	findAll(".arrow", viewer).forEach(function(arrow){
		arrow.addEventListener("click", function(){
			showPhoto(current + parseInt(arrow.getAttribute("data-step")));
		});
	});

	thumbnails.forEach(function(thumbnail, index){
		thumbnail.addEventListener("click", function(){ showPhoto(index); });
	});

	document.addEventListener("keydown", function(e){
		if (e.metaKey || e.ctrlKey || e.altKey) return;
		if (e.key == "ArrowLeft") showPhoto(current - 1);
		if (e.key == "ArrowRight") showPhoto(current + 1);
	});

	// Swipe on a phone
	var startX = null;

	viewer.addEventListener("touchstart", function(e){
		startX = e.touches.length == 1 ? e.touches[0].clientX : null;
	}, { passive: true });

	viewer.addEventListener("touchend", function(e){
		if (startX == null) return;
		var distance = e.changedTouches[0].clientX - startX;
		startX = null;
		if (Math.abs(distance) > 40) showPhoto(current + (distance < 0 ? 1 : -1));
	}, { passive: true });
}

// Credits: the role filter
function initCreditsFilter() {
	var buttons = findAll(".role-button");
	if (!buttons.length) return;

	var groups = findAll(".year-group");
	var summary = document.querySelector(".credits-filter .summary");
	var list = document.querySelector(".roles");
	var underline = document.querySelector(".role-underline");
	var roles = {
		ld: " as Lighting Designer",
		as: " as Associate or Assistant Lighting Designer",
		pr: " as Programmer"
	};

	// The red line under the selected role slides over from the last one, like the line in the nav
	function moveUnderline(animate) {
		var button = list.querySelector("[aria-pressed=true]");
		if (!underline || !button) return;

		underline.style.transition = animate && !reducedMotion ? "" : "none";
		underline.style.width = button.offsetWidth + "px";
		underline.style.transform = "translate(" + button.offsetLeft + "px," + (button.offsetTop + button.offsetHeight - 2) + "px)";
	}

	function filter(tag) {
		var total = 0;
		var years = [];

		groups.forEach(function(group){
			var shown = 0;

			findAll(".credit", group).forEach(function(credit){
				var match = !tag || credit.getAttribute("data-tags").split(" ").indexOf(tag) != -1;
				credit.hidden = !match;
				if (match) {
					shown++;
					years.push(parseInt(credit.getAttribute("data-year")));
				}
			});

			group.hidden = !shown;
			total += shown;

			// The Now group says "On stage" instead of a count
			if (!group.classList.contains("now")) {
				group.querySelector(".count").textContent = shown + (shown == 1 ? " credit" : " credits");
			}
		});

		buttons.forEach(function(button){
			button.setAttribute("aria-pressed", button.getAttribute("data-filter") == tag ? "true" : "false");
		});
		moveUnderline(true);

		if (summary) {
			var text = "Showing " + total + (total == 1 ? " credit" : " credits") + (roles[tag] || "");
			if (years.length) text += ", " + Math.min.apply(null, years) + " to " + Math.max.apply(null, years);
			summary.textContent = text;
		}
	}

	buttons.forEach(function(button){
		button.addEventListener("click", function(){
			filter(button.getAttribute("data-filter"));
		});
	});

	list.classList.add("js");
	moveUnderline(false);
	window.addEventListener("resize", function(){ moveUnderline(false); });
	if (document.fonts && document.fonts.ready) {
		document.fonts.ready.then(function(){ moveUnderline(false); });
	}
}

// Contact: the email address is written backwards in the page to keep it from scrapers
function initEmail() {
	function reverse(text) {
		return text.split("").reverse().join("");
	}

	findAll(".email").forEach(function(email){
		var address = reverse(email.getAttribute("data-user")) + "@" + reverse(email.getAttribute("data-website"));

		var link = document.createElement("a");
		link.href = "mailto:" + address;
		link.textContent = address;

		email.textContent = "";
		email.appendChild(link);
	});
}
