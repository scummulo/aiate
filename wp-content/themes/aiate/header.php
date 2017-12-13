<?php
/**
 * The header for our theme
 * @package Aiate
 */
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/dist/assets/js/custom.min.js"></script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header>
		<nav>
			<div class="topbar">
				<div class="container-fluid">
					<div class="logo-responsive">
						<a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/dist/assets/img/logo-white.png" alt="aiate-logo"></a>
					</div>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'topbar_left',
						'container'      => 'ul',
						'menu_class'=> 'nav-web'
					) );
					?>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'topbar_right',
						'container'      => 'ul',
						'menu_class'=> 'nav-web'
					) );
					?>
					<button id="toggle-menu" class="menu">Menú</button>
				</div>
			</div>
			<div class="navbar">
				<div class="container-fluid">
					<div class="logo">
						<a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/dist/assets/img/logo.png" alt="aiate-logo"></a>
					</div>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'nav',
						'container'      => 'ul',
						'menu_class'=> 'nav-web'
					) );
					?>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'topbar_left',
						'container'      => 'ul',
						'menu_class'=> 'nav-mobile'
					) );
					?>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'topbar_right',
						'container'      => 'ul',
						'menu_class'=> 'nav-mobile'
					) );
					?>
				</div>
			</div>
		</nav>
	</header>

	<main>
