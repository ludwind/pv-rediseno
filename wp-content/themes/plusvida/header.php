<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="//code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />

 <!-- ---------------- DATE PICKER ------------------ -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<!-- ---------------- DATE PICKER ------------------ -->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> onload="init()">
<div id="page" class="hfeed site">


<header class="head-front">
<!-- --- header login  user -------- -->
<?php if ( is_user_logged_in() ) {?>
<img src="wp-content/themes/plusvida/img/home/head-img-user.jpg" class="imghead"/>
<?php } ?>
<!-- --- header public -------------- -->
<?php if ( !is_user_logged_in() ) {?>
<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="wp-content/themes/plusvida/img/home/head-img.jpg" class="imghead"/></a>
<?php } ?>

<aside><ul>
	<li><a href="https://twitter.com/" target="_new"><img src="wp-content/themes/plusvida/img/home/redes-twitter.png"/><span>Twitter</span></a></li>
	<li><a href="https://www.facebook.com/pages/Plus-Vida/514691545241261" target="_new">
			<img src="wp-content/themes/plusvida/img/home/redes-facebook.png"/><span>Facebook</span></a></li>
	<li><a href="https://plus.google.com" target="_new"><img src="wp-content/themes/plusvida/img/home/redes-google-plus.png"/><span>Google+</span></a></li>
</aside></ul>

<?php if(!is_page('909')) { ?>
<!-- --- menu login  user -------- -->
<?php if ( is_user_logged_in() ) {?>
<div class="menu-users">	<ul id="tabs">
		<li><a class="selected " href="#mipeso" id="tabsazulobscuro">Mi Peso</a></li>
		<li><a class="" href="#grabaciones" id="tabsazulclaro">Grabaciones</a></li>
		<li><a class="" href="#conferencias" id="tabsazulobscuro">Conferencias</a></li>
		<li><a class="" href="#drpusvida" id="tabsazulclaro">dr. plusvida</a></li>
		<li><a class="" href="#contacto" id="tabsazulobscuro">Contacto</a></li>
		<div class="userlinkspv">
			<span>hola, <?php global $current_user; if ( isset($current_user) ) { echo $current_user->display_name;}?></span>
			<ul>
				<li><a href="<?php echo wp_logout_url( home_url() ); ?>">Cerrar sesión</a></li>
				<li><a href="<?php echo wp_logout_url( home_url() ); ?>">inicio</a></li>
			</ul>
		</div>
	</ul></div>

<?php } ?>
<!-- --- menu public -------------- -->
<?php if ( !is_user_logged_in() ) {?>
	<div class="mainmenu"><ul>
		<li class="home mmazulobscuro mmunalinea"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Inicio</a></li>
		<li class="postid-15 mmazulclaro postid-15"><a href="?paginas-website=de-que-se-trata">¿De qué se trata?</a></li>
		<li class="postid-16 mmazulobscuro"><a href="?paginas-website=como-funciona">¿Cómo funciona?</a></li>
		<li class="postid-17 mmazulclaro mmunalinea"><a href="?paginas-website=contacto">Contacto</a></li>
		<li class="postid-8 mmazulobscuro"><a href="?paginas-website=login">Ingreso a miembros</a></li>
		<li class="postid-18 mmazulclaro mmunalinea"><a href="?paginas-website=contacto#incribete">¿Aún no eres miembro?</a></li>
	</div></ul>
<?php } ?><?php } ?>
</header>

<!--	<header id="masthead" class="site-header" role="banner">
		<hgroup>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</hgroup>-->

		<!--<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle"><?php _e( 'Menu', 'twentytwelve' ); ?></button>
			<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentytwelve' ); ?>"><?php _e( 'Skip to content', 'twentytwelve' ); ?></a>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
		</nav><!-- #site-navigation -->

		<!--	<?php if ( get_header_image() ) : ?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php header_image(); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
		<?php endif; ?>
	</header><!-- #masthead -->

	<!--<div id="main" class="wrapper">-->
