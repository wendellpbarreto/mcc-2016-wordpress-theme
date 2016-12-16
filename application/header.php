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

    <!-- libs@animate -->
    <link rel="stylesheet" href="<?php echo get_assets_root_uri(); ?>/vendor/animate/animate.css">

    <!-- libs@sweetalert -->
	<script src="<?php echo get_assets_root_uri(); ?>/bower_components/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="<?php echo get_assets_root_uri(); ?>/bower_components/sweetalert/dist/sweetalert.css">

    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_assets_root_uri(); ?>/fonts/font-awesome/css/font-awesome.min.css">

    <!-- main style -->
    <link rel="stylesheet" href="<?php echo get_assets_root_uri(); ?>/styles/main.css">

	<!-- wordpress -->
	<?php wp_head(); ?>
	</head>
<body>

