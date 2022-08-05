(function( $ ) {
	console.log($('#loginform'));
	window._wq = window._wq || [];
	_wq.push({ 
		id:'0131326dff',
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
                $('form#login p.status').text(data.message);
                if (data.loggedin == true){
					$('.login-popup').addClass('d-none');
					siteData.loginStatus = true;
                }
            }
        });
	});
})( jQuery );