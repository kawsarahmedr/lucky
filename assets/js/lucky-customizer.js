(function($){
	// user customize scripts
	$(document).ready(function(){
		wp.customize('lucky_copyright_text', function(value){
			value.bind(function(to){
				$('.copyright-text').text(to);
			})
		});
		/* lucky site title color */
		wp.customize('lucky_site_title_color', function(value){
			value.bind(function(to){
				$('.text-logo, .lucky-site-description').css('color', to);
			});
		});

	})
})(jQuery)
/*
 * The End ! Theme created by https://urldev.com
 */