'use strict'

$(function() {


$('#userForm .tamerlan').click(function(e){
	e.preventDefault();
	var $data;

	$data = $(this).parent('form').serializeArray();

	$.ajax({
		url: $(this).parent('form').attr('action'),
		type: 'POST',
		data: $data,
		 success: function(result) {
		 	console.log(result);
		 }	
	})

	});

});




