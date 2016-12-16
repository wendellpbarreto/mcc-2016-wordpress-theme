        <!-- scripts::vendor -->
        <script src="<?php echo get_assets_root_uri(); ?>/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="<?php echo get_assets_root_uri(); ?>/bower_components/foundation/js/foundation.min.js"></script>
        <script src="<?php echo get_assets_root_uri(); ?>/vendor/classie/classie.js"></script>

        <!-- libs@owl-carousel -->
        <link rel="stylesheet" href="<?php echo get_assets_root_uri(); ?>/vendor/owl.carousel/assets/owl.carousel.css">
        <script src="<?php echo get_assets_root_uri(); ?>/vendor/owl.carousel/owl.carousel.min.js"></script>

        <?php wp_footer(); ?>

        <!-- scripts::main -->
        <script src="<?php echo get_assets_root_uri(); ?>/scripts/main.min.js"></script>

        <!-- facebook api -->
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
        	var js, fjs = d.getElementsByTagName(s)[0];
        	if (d.getElementById(id)) return;
        	js = d.createElement(s); js.id = id;
        	js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=1097600120328629";
        	fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

        <script>
        	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        	})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        	ga('create', 'UA-89100521-1', 'auto');
        	ga('send', 'pageview');

        </script>

        <!-- google maps api -->
        <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDpeBjRT8swOK43cpc1-NmpdRoTy4eQR9A&sensor=false"></script>
    </body>
    </html>
