        <!-- scripts::vendor -->
        <script src="<?php echo get_assets_root_uri(); ?>/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="<?php echo get_assets_root_uri(); ?>/bower_components/foundation/js/foundation.min.js"></script>
        <script src="<?php echo get_assets_root_uri(); ?>/vendor/owl.carousel/owl.carousel.min.js"></script>
        <script src="<?php echo get_assets_root_uri(); ?>/vendor/classie/classie.js"></script>

		    <?php wp_footer(); ?>
        <!-- scripts::main -->
        <script src="<?php echo get_assets_root_uri(); ?>/scripts/main.min.js"></script>

        <!-- facebook api -->
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        <!-- google maps api -->
				<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDpeBjRT8swOK43cpc1-NmpdRoTy4eQR9A&sensor=false"></script>

	</body>
</html>
