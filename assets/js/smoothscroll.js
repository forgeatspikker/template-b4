jQuery(document).ready(function() {
	jQuery('.smooth-scroll').on('click', function(e) {
		e.preventDefault();
		if (typeof gbucontent === 'undefined') {
			var gbucontent = jQuery('#gbucontent');
		}
		var article = gbucontent.data('article');
		if ((location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname)
			|| (typeof article !== 'undefined' && article == 'true')) {
			var target = jQuery(this.hash);
			target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
			if (target.length) {
				jQuery('html,body').animate({
					scrollTop: target.offset().top-150
				}, 1000);
			}
		}
	});
});