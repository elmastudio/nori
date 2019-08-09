/*---------------------------------------------------------------------------------------------
  Masonry Layout Script (see http://masonry.desandro.com/)
----------------------------------------------------------------------------------------------*/

  jQuery(window).load(function(){

    jQuery(window).resize(function(){
      jQuery('.widget-area').masonry({
          itemSelector: '.widget',
          isResizable: false,
          // set columnWidth a fraction of the container width
          masonry: {columnWidth: jQuery('.widget-area').width() / 4 }
      });
    // trigger resize to set up masonry on start-up
    }).resize();

  });

  if (document.documentElement.clientWidth > 1220) {
  jQuery(window).load(function(){

    jQuery(window).resize(function(){
      jQuery('#posts-container').masonry({
          itemSelector: '.post, .page',
          isResizable: false,
          // set columnWidth a fraction of the container width
          masonry: {columnWidth: jQuery('#posts-container').width() / 2  }
      });
    // trigger resize to set up masonry on start-up
    }).resize();

  });
  }

/*---------------------------------------------------------------------------------------------
  Flexible width for embedded videos (see https://github.com/davatron5000/FitVids.js/)
----------------------------------------------------------------------------------------------*/
	jQuery(document).ready(function(){
		// Target your .container, .wrapper, .post, etc.
		jQuery('#content').fitVids();
	});

/*---------------------------------------------------------------------------------------------
  Support Placeholder input text in IE (see https://github.com/danielstocks/jQuery-Placeholder)
----------------------------------------------------------------------------------------------*/
	jQuery(document).ready(function(){
		jQuery('input[placeholder], textarea[placeholder]').placeholder();
	});