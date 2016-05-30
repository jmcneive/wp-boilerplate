<!DOCTYPE html>

<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]> <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">		
		<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0, maximum-scale=1">

		<title><?php echo bloginfo('name') . wp_title( '|', true, 'left' ); ?></title>

		<link rel="shortcut icon" href="<?php echo ASSETS_URI; ?>/favicon.ico">
  		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- end of wordpress head -->

	</head>

	<body <?php body_class(); ?>>

	    <div id="main">

    		<header role="banner" class="clearfix">

                <a id="logo" href="<?php echo home_url(); ?>"></a>

                <a href="" class="navbar-toggle"></a>
    			
    			<div class="navigation">

    				<nav role="navigation">

    					<ul id="main-menu">
    					    <?php wpbp_main_nav(); // Manage this nav using Menus in Wordpress Admin, also see theme.menus.php and theme.walker.php ?>
    					</ul>

    				</nav>

    			</div> <!-- end .navigation -->

    		</header> <!-- end header -->
