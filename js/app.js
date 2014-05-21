var selected = 0;

function addRight() {
	$('.project:visible').each(function (i) {
		if ((i+1)% 2 === 0) {
			$(this).addClass('right');
		}
	});
}

function addFocus(filter) {
	$('.' + filter).addClass('focus');
	$('.project').hide();
	$('.project.focus').css('display', 'inline-block');
	$('.project.right').removeClass('right');
	addRight();
}

function removeFocus(filter) {
	$('.' + filter).removeClass('focus');
	$('.' + filter).hide();
	$('.project.right').removeClass('right');
	if (selected-1 === 0) {
		$('.project').css('display', 'inline-block');
	}
	addRight();
}

$(document).ready(function(){
	addRight();
	$(".fitvid").fitVids();
	
	
	$(".work-section").mouseover(function() {
		$(this).find(".arrow-btn").addClass("hover");
	});
	
	$(".work-section").mouseout(function() {
		$(this).find(".arrow-btn").removeClass("hover");
	});
	
	$(".portfolio-categories ul li a").click(function() {
		if ($(this).hasClass('active')) {
			$(this).removeClass('active');
			removeFocus($(this).data('filter'));
			selected = selected - 1;
		} else {
			$(this).addClass('active');
			addFocus($(this).data('filter'));
			selected = selected + 1;
		}
		return false;
	});
	
	if(window.location.hash) {
	
		var hash = window.location.hash.substring(1);
		selector = ".portfolio-categories ul li a[data-filter='" + hash + "']"
		
		if ($(selector).length) {
			$(selector).trigger('click');
			var top = $('#portfolio-list').position().top;
			$(window).scrollTop(top);
		}
	}
});