(function( $ ) {
	var videoId = '0131326dff';
	window._wq = window._wq || [];
	_wq.push({ 
		id:videoId,
		onReady: function(video) {
			console.log('test');
			video.bind("crosstime", 59, function() {
				if(!siteData.loginStatus) {		
					video.pause();
					loginPrompt();
				}
			});
		}
	});

	function loginPrompt() {
		$('.login-popup').removeClass('d-none');
	}
	$(document).ready(function() {
		$('#loginform').on('submit', function(e) {
			e.preventDefault();
			$.ajax({
				type: 'POST',
				dataType: 'json',
				url: siteData.ajaxUrl,
				data: { 
					'action' : 'login_user',
					'username': $('form#loginform #user_login').val(), 
					'password': $('form#loginform #user_pass').val(), 
					'security': $('form#loginform #security').val() },
				success: function(data){
					$('#loginform p.status').text(data.message);
					if (data.loggedin == true){
						$('.login-popup').addClass('d-none');
						Wistia.api(videoId).play();
						siteData.loginStatus = true;
					}
				}
			});
		});
	});
})( jQuery );