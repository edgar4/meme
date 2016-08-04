(function($) {

	// When document is ready
	$(document).ready(function(event) {
		$('.container.gallery').masonry({
		  // set itemSelector so .grid-sizer is not used in layout
		  itemSelector: '.meme-container',
		  // use element for option
		  columnWidth: '.meme-container',
		  percentPosition: false
		});

	});

	
})(jQuery);