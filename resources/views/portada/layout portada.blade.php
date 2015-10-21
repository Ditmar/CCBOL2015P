<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>

    <!-- css -->
    <link href="{{asset('../css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('../font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('../css/nivo-lightbox.css')}}" rel="stylesheet" />
    <link href="{{asset('../css/nivo-lightbox-theme/default/default.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('../css/owl.carousel.css')}}" rel="stylesheet" media="screen" />
    <link href="{{asset('../css/owl.theme.css')}}" rel="stylesheet" media="screen" />
    <link href="{{asset('../css/flexslider.css')}}" rel="stylesheet" />
    <link href="{{asset('../css/animate.css')}}" rel="stylesheet" />
    <link href="{{asset('../css/style.css')}}" rel="stylesheet">
    <link href="{{asset('../color/default.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/select2-bootstrap.css')}}">
    <!--
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/simplex/bootstrap.min.css" rel="stylesheet" integrity="sha256-4nVETqQoIoCwuephcXpJ501G8B5sgBHb1ZsKU/D476I= sha512-cfSmkkLRDAcUNaJxRRWopCyEGX43UkWCAOl2wErYMBGOQVWwOsZ7IFuXScF9H/6nMGbmsgV4m5/xYfesyvHTxw==" crossorigin="anonymous">
  	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha256-k2/8zcNbxVIh5mnQ52A0r3a6jAgMGxFJFE2707UxGCk= sha512-ZV9KawG2Legkwp3nAlxLIVFudTauWuBpC10uEafMHYL0Sarrz5A7G79kXh5+5+woxQ5HM559XX2UZjMJ36Wplg==" crossorigin="anonymous">
  	<link rel="stylesheet" type="text/css" href="{{asset('css/blog.css')}}">
  	<link rel="stylesheet" href="{{asset('css/trumbowyg.min.css')}}">
    -->

</head>
<body>
	@yield('content')
    <!-- secsion js-->
  <script src="{{asset('../js/jquery.min.js')}}"></script>
  <script src="{{asset('../js/bootstrap.min.js')}}"></script>
	<script src="{{asset('../js/jquery.sticky.js')}}"></script>
	<script src="{{asset('../js/jquery.flexslider-min.js')}}"></script>
  <script src="{{asset('../js/jquery.easing.min.js')}}"></script>
	<script src="{{asset('../js/jquery.scrollTo.js')}}"></script>
	<script src="{{asset('../js/jquery.appear.js')}}"></script>
	<script src="{{asset('../js/stellar.js')}}"></script>
	<script src="{{asset('../js/wow.min.js')}}"></script>
	<script src="{{asset('../js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('../js/nivo-lightbox.min.js')}}"></script>
  <script src="{{asset('../../js/custom.js')}}"></script>

  <script src="{{asset('js/trumbowyg.min.js')}}"></script>
  <script src="{{asset('js/select2.min.js')}}"></script>

  <script src="{{asset('js/raphael-min.js')}}"></script>
  <script src="{{asset('js/flowchart-latest.js')}}"></script>
  <script src="{{asset('js/serializeObject.js')}}"></script>

  <!--
  <script src="{{asset('../js/animatescroll.min.js')}}"></script>
  <script src="{{asset('../js/trumbowyg.min.js')}}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha256-Sk3nkD6mLTMOF0EOpNtsIry+s1CsaqQC1rVLTAy+0yc= sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
  -->
  @if(isset($_GET['page']))
	<script>
		$(function(){
			$('section').css({'padding-top':'0px'});
			$(window).scroll(function(){
				if ($(this).scrollTop() >= 100) {
					$('section').css({'padding-top':'30px'});
				}
			});
		});
	</script>
	@endif
	<script>
	$(window).scroll(function() {
		/* Act on the event */
		//console.log($(this).scrollTop())
		if ($(this).scrollTop() > 600) {
			$('#navi').removeClass('hide');
			$('#navi').addClass('navbar-fixed-top');
		}
		else{
			$('#navi').removeClass('navbar-fixed-top');
			$('#navi').addClass('hide');
		};

		if ($(this).scrollTop() <= 600) {
			$('#navi2').removeClass('hide');
			$('#navi2').addClass('navbar-fixed-top');
		}
		else{
			$('#navi2').removeClass('navbar-fixed-top');
			$('#navi2').addClass('hide');
		};
	});
	</script>
	@yield('js')
</body>
</html>
