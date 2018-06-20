
$(document).ready(function(){

	$('#profile-btn').click(function(){

		$('#p-info').css('display', 'block');
		$('#c-info').css('display', 'none');
		$('#profile-btn').css('background-color', '#fff');
		$('#history-btn').css('background-color', '#d3a713');

	});

	$('#history-btn').click(function(){

		$('#c-info').css('display', 'block');
		$('#p-info').css('display', 'none');
		$('#profile-btn').css('background-color', '#d3a713');
		$('#history-btn').css('background-color', '#fff');

	});
});