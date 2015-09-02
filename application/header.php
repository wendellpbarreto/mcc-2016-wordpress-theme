<!doctype html>
<html lang="pt-BR">
	<head>
	<meta charset="UTF-8">
	<title><?php echo get_bloginfo('name'); ?><?php wp_title('|', true, 'left'); ?></title>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<meta name="robots" content="index,follow">
	<meta name="viewport" content="initial-scale=1.0 maximum-scale=1.0 user-scalable=no">
        <link rel="icon" type="image/png" href="<?php echo get_image('mcc@favicon.png') ?>">
        <!-- meta tags -->
        <meta name="author" content="MCC">
        <meta name="description" content="">
        <meta name="keywords" content="museu, câmara, cascudo, site, website, natal, rio, grande, do, norte, wordpress, blog">
        <!-- facebook tags -->
        <?php include 'includes/facebook_tags.php' ?>
        <!-- twitter tags -->
        <meta name="twitter:card" content="">
        <meta name="twitter:image" content="<?php echo get_image( 'logo.png' ) ?>">
        <meta name="twitter:site" content="<?php echo get_site_url() ?>">
        <meta name="twitter:creator" content="">
        <!-- scripts -->
        <script src="<?php echo get_assets_root_uri(); ?>/bower_components/modernizr/modernizr.js"></script>
        <!-- fonts -->
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Noto+Serif:400italic,700italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?php echo get_assets_root_uri(); ?>/fonts/icomoon/style.css">
        <link rel="stylesheet" href="<?php echo get_assets_root_uri(); ?>/fonts/simple-line-icons/simple-line-icons.css">
        <!-- stylesheets::vendor -->
        <link rel="stylesheet" href="<?php echo get_assets_root_uri(); ?>/vendor/animate/animate.css">
        <link rel="stylesheet" href="<?php echo get_assets_root_uri(); ?>/vendor/owl.carousel/assets/owl.carousel.css">
        <!-- stylesheets::main -->
        <link rel="stylesheet" href="<?php echo get_assets_root_uri(); ?>/styles/main.css">
	<!-- wordpress -->
	<?php wp_head(); ?>
	</head>
	<body>

