// NOTICE!! DO NOT USE ANY OF THIS JAVASCRIPT
// IT'S ALL JUST JUNK FOR OUR DOCS!
// ++++++++++++++++++++++++++++++++++++++++++

!function($) {
	//子菜跟随
	$(document).scroll(function(){
	    // If has not activated (has no attribute "data-top"
	    if (!$('.subnav').attr('data-top')) {
	        // If already fixed, then do nothing
	        if ($('.subnav').hasClass('subnav-fixed')) return;
	        // Remember top position
	        var offset = $('.subnav').offset();
	        $('.subnav').attr('data-top', offset.top);
	    }

	    if ($('.subnav').attr('data-top') - $('.subnav').outerHeight() <= $(this).scrollTop())
	        $('.subnav').addClass('subnav-fixed');
	    else
	        $('.subnav').removeClass('subnav-fixed');
	});
	//主菜单动作
	$(function(){
		var url = window.location;
		// Will only work if string in href matches with location
		$('ul.nav a[href="'+ url +'"]').parent().addClass('active');

		// Will also work for relative and absolute hrefs
		$('ul.nav a').filter(function() {
		    return this.href == url;
		}).parent().addClass('active');
		
	})

}(window.jQuery)