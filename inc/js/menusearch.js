jQuery(function($) { 
'use strict';

/*searchmenu*/

$(document).ready(function(){
	$('a[href="#searchmenu"]').on('click', function(event) {                    
		$('#searchmenu').addClass('open');
		$('#searchmenu > form > input[type="search"]').focus();
	});            
	$('#searchmenu, #searchmenu button.close').on('click keyup', function(event) {
		if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
			$(this).removeClass('open');
		}
	});            
});


/*end searchmenu*/


}(jQuery));