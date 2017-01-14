$('#case1_button').server_validation({form_id:'case1',button_id:'case1_button'});
$('#case2_button').server_validation({form_id:'case2',button_id:'case2_button',after_success:callback_function});
$('#case3_button').server_validation({form_id:'case3',button_id:'case3_button'});

function callback_function(){
	alert("You can load other things or manupulate the other DOM elements");
}