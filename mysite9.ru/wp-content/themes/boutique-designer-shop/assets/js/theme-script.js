
function boutique_designer_shop_gb_Menu_open() {
	jQuery(".side_gb_nav").addClass('show');
}
function boutique_designer_shop_gb_Menu_close() {
	jQuery(".side_gb_nav").removeClass('show');
}

jQuery(function($){
	$('.gb_toggle').click(function () {
        boutique_designer_shop_Keyboard_loop($('.side_gb_nav'));
    });

});

jQuery(window).load(function() {
	jQuery(".preloader").delay(2000).fadeOut("slow");
});

jQuery(window).scroll(function(){
	if (jQuery(this).scrollTop() > 100) {
		jQuery('.scrollup').addClass('is-active');
	} else {
  		jQuery('.scrollup').removeClass('is-active');
	}
});

jQuery( document ).ready(function() {
	jQuery('#boutique-designer-shop-scroll-to-top').click(function (argument) {
		jQuery("html, body").animate({
	       scrollTop: 0
	   }, 600);
	})
})
// sticky header
jQuery(window).scroll(function(){
    if (jQuery(this).scrollTop() > 120) {
        jQuery('.fixed_header').addClass('fixed');
    } else {
            jQuery('.fixed_header').removeClass('fixed');
    }
});