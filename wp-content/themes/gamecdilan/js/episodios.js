jQuery(document).ready(function(){
	slider();
});

function slider(){
	jQuery('#episodios').bxSlider({
		auto: false,
		displaySlideQty: 4,
	    moveSlideQty: 1
	});
};