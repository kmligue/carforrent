<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>U-DriveBohol</title>

	    {{ HTML::style('/assets/css/bootstrap.min.css') }}
	    {{ HTML::style('/assets/jquery-ui-1.11.2.custom/jquery-ui.min.css') }}
	    {{ HTML::style('/assets/font-awesome-4.1.0/css/font-awesome.min.css') }}
	    {{ HTML::style('/assets/css/animate.css') }}
	    {{ HTML::style('/assets/css/style.css') }}

	    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
	</head>
	<body>

		@yield('content')
		
	    {{ HTML::script('/assets/js/jquery.js') }}
	    {{ HTML::script('/assets/js/bootstrap.min.js') }}
	    {{ HTML::script('/assets/jquery-ui-1.11.2.custom/jquery-ui.min.js') }}
	    {{ HTML::script('/assets/js/skrollr.min.js') }}

	    <script>
	    	$(function() {
	    		$('#datepicker1').datepicker({
	    			minDate: 'today',
	    			onClose: function(selectedDate) {
	    				$('#datepicker2').datepicker('option', 'minDate', selectedDate);
	    			}
	    		});
	    		$('#datepicker2').datepicker();

	    		skrollr.init({
	    			smoothScrolling: true,
	    			forceHeight: false
	    		});

	    		$('a[href*=#]:not([href=#])').click(function() {
	    			if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	    				var target = $(this.hash);
	    				target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	    				if (target.length) {
	    					$('html,body').animate({
	    						scrollTop: target.offset().top
	    					}, 1000);
	    					return false;
	    				}
	    			}
	    		});

	    		$(window).scroll(function (event) {
	    			var scroll = $(window).scrollTop();

    				if(scroll >= 100) {
    					$('.header-menu-scroll').css('display', 'block');
    					$('.header-menu-scroll').removeClass('animated fadeOutUp');
    					$('.header-menu-scroll').addClass('animated fadeInDown');
    				}
    				else {
    					$('.header-menu-scroll').removeClass('animated fadeInDown');
    					$('.header-menu-scroll').addClass('animated fadeOutUp');
    					$('.header-menu-scroll').css('display', 'none');
    				}
				});

				$(':checkbox').on('click', function(evt) {
					var $this = $(this);

					if($this.is(':checked')) {
						$('select[name="return-loc"]').css('display', 'block');
					}
					else {
						$('select[name="return-loc"]').css('display', 'none');
					}
				});
	    	});
	    </script>
	</body>
</html>