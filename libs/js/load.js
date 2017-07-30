$(document).ready(function(){
	$(".num").click(function(e) {
		$('.sec5tool').hide();
	 	$(this).children('.sec5tool').toggle();
	  	e.stopPropagation();
	});
	$('.sec5tool').click(function(e) {
  		e.stopPropagation();
	});
	$(document).click(function() {
	  	$('.sec5tool').hide();
	});
});