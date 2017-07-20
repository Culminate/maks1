$(document).ready(function(){
	$.ajax({
  		url: 'libs/js/load.html',
  		dataType: 'text',
  		async: false,
  		
  		success: function (data) {
  		$("head").append(data);
  		}
	});
});
