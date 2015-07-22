<!doctype html>
<html lang="en-gb" class="no-js">

<head>
    <title>@yield('title')</title>

    <!-- ***** meta ***** -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes">
    <meta name="keywords" content="premium html template, unique premium template, multipurpose" />
    <meta name="description" content="@yield('description')" />

    <!-- ***** Favicons ***** -->
    <link rel="shortcut icon" href="{{ asset('frontend/images/favicon.ico') }}">

    <!-- ***** Google Fonts ***** -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/all.css') }}" media="screen" />
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    @yield('header_content')
    <!-- JS -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="{{ asset('frontend/js/jquery.min.js') }}}">\x3C/script>')</script>
</head>
<body class="">
<div id="page-wrapper">
    <header id="header" class="nav-down header1">
        <div id="panel">
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <ul class="info-left reset-list">
                            <li><span class="icon-location"></span><p>270 E. Carmel Dr. Carmel, IN 46032</p></li>
                            <li><span class="icon-phone"></span><p>317-814-5383</p></li>
                            <li><span class="icon-envelope2"></span><p>jshort@c21scheetz.com</p></li>

                        </ul>
                    </div>
                    <div class="col-sm-3">
                        <ul class="info-right reset-list">
                            <li class="ico-facebook animation">
                                <a href="https://www.facebook.com/century21scheetz">
                                    <span class="icon-facebook"></span>
                                </a>
                            </li>
                            <li class="ico-twitter animation">
                                <a href="https://twitter.com/c21scheetz">
                                    <span class="icon-twitter"></span>
                                </a>
                            </li>
                            <li class="ico-youtube animation">
                                <a href="https://www.youtube.com/user/century21scheetz">
                                    <span class="icon-youtube"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide">
            <div class="container relative">
                <a href="#" class="btn-slide"><span class="icon-angle-up"></span></a>
            </div>
        </div><!-- end sliding panel -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="relative onlyh3">
                        <div class="logo-container">
                            <h1 id="logo">
                                <a href="{{ url('/') }}">
                                    <div class="logo-default">
                                        <img src="{{ asset('frontend/images/logo.png') }}" alt="Indy Career In Real Estate" title="Click to return to Indy Career in Real Estate" class="img-responsive">
                                    </div>
                                    <div class="logo-white">
                                        <img src="{{ asset('frontend/images/logo.png') }}" alt="Indy Career In Real Estate" title="Click to return to Indy Career in Real Estate" class="img-responsive">
                                    </div>
                                </a>
                            </h1><!-- end logo -->
                        </div><!-- end logo-container -->
                        <!-- Responsive Menu -->
                        <div class="zn-res-menuwrapper">
                            <a class="zn-res-trigger" href="#"></a>
                        </div>
                        @include('frontend.partials.main_navigation')
                    </div>
                </div>
            </div>
        </div>
    </header>

    @yield('main-content')
    <footer class="footer-style2">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 mbottom30">
                    <a href="index.html">
                        <img src="{{ asset('frontend/images/scheetz_black.png') }}" alt="" class="default img-responsive" />
                        <img src="{{ asset('frontend/images/logo.png') }}" alt="" class="only3" />
                    </a>
                    <div class="social mtop25 mbottom30 clearfix">
                        <ul class="reset-list">
                            <li class="ico-facebook animation">
                                <a href="https://www.facebook.com/century21scheetz">
                                    <span class="icon-facebook"></span>
                                </a>
                            </li>
                            <li class="ico-twitter animation">
                                <a href="https://twitter.com/c21scheetz">
                                    <span class="icon-twitter"></span>
                                </a>
                            </li>
                            <li class="ico-youtube animation">
                                <a href="https://www.youtube.com/user/century21scheetz">
                                    <span class="icon-youtube"></span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-sm-8 mbottom30">
                    <h2 class="section-title">Our Team</h2>
                    <div id="" class="our-team-footer">
                        @include('frontend.partials.team')
                    </div><!-- end our-team -->
                </div>
            </div>
        </div>
        <div class="bottom-footer">
            <div class="container">
                <div class="row ptop10">
                    <div class="col-sm-6 col-xs-12 mbottom20">
                        <p class="copyright">© <?php echo date('Y') ?> - <strong>CENTURY 21 Scheetz</strong>. All Rights Reserved</p>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="social-buttons">
                            <div class="facebook-button">
                                <!-- Change this iframe with your own. -->
                                <iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fcentury21scheetz&amp;width&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px;" allowTransparency="true"></iframe>
                            </div>
                            <div class="twitter-button">
                                <!-- Change data-via to your own. -->
                                <a href="https://twitter.com/share" class="twitter-share-button" data-via="c21scheetz">Tweet</a>
                                <script>
                                    !function(d,s,id){
                                        var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
                                        if(!d.getElementById(id)){
                                            js=d.createElement(s);
                                            js.id=id;
                                            js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
                                </script>
                            </div>
                            <div class="google-button">
                                <!-- Place this tag where you want the +1 button to render. -->
                                <div class="g-plusone" data-size="medium"></div>
                                <!-- Place this tag after the last +1 button tag. -->
                                <script type="text/javascript">
                                    (function() {
                                        var po = document.createElement('script');
                                        po.type = 'text/javascript';
                                        po.async = true;
                                        po.src = 'https://apis.google.com/js/plusone.js';
                                        var s = document.getElementsByTagName('script')[0];
                                        s.parentNode.insertBefore(po, s);
                                    }
                                    )();
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer><!-- end footer -->
</div>
<p id="back-top">
    <a href="#top"><span class="icon-angle-up"></span></a>
</p>


<!-- JavaScript at the bottom for faster page loading -->
<script type="text/javascript" src="{{asset('frontend/js/all.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/classie.js')}}"></script>
@yield('footer-scripts')

<script>
    @yield('init')
</script>
<script> /* Revolution Slider */
    $(document).ready(function() {
        $('#revslider1').show().revolution(
                {
                    delay:9000,
                    startwidth:1170,
                    startheight:500,
                    hideThumbs:10,
                    fullWidth:"on",
                    forceFullWidth:"off"
                });
    });
</script>
<script type="text/javascript"> /* Owl Carousel */
    $(document).ready(function() {
        $("#our-team").owlCarousel({

            autoPlay: 3000, //Set AutoPlay to 3 seconds

            items : 4,
            itemsDesktop : [1199,3],
            itemsDesktopSmall : [979,3],
            autoPlay : false,
            navigation : true,
            pagination : false,
            navigationText: [
                "<i class='icon-angle-left animation'></i>",
                "<i class='icon-angle-right animation'></i>"
            ]
        });
    });
</script>
<script type="text/javascript"> /* Owl Carousel */
    $(document).ready(function() {
        $(".our-team-footer").owlCarousel({

            autoPlay: 3000, //Set AutoPlay to 3 seconds

            items : 4,
            autoPlay : false,
            navigation : true,
            pagination : false,
            navigationText: [
                "<i class='icon-angle-left animation'></i>",
                "<i class='icon-angle-right animation'></i>"
            ]
        });
    });
</script>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID.
<script>
	(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
	function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
	e=o.createElement(i);r=o.getElementsByTagName(i)[0];
	e.src='//www.google-analytics.com/analytics.js';
	r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
	ga('create','UA-XXXXX-X');ga('send','pageview');
</script>
-->
</body>
</html>