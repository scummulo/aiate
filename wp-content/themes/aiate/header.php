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

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header>
		<nav>
			<div class="topbar">
				<div class="container">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'topbar_left',
						'container'      => 'ul',
						'menu_class'=> ''
					) );
					?>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'topbar_right',
						'container'      => 'ul',
						'menu_class'=> ''
					) );
					?>
				</div>
			</div>
			<div class="navbar">
				<div class="container">
					<div class="logo">
						<img src="./assets/img/logo.svg" alt="">
					</div>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'nav',
						'container'      => 'ul',
						'menu_class'=> ''
					) );
					?>
				</div>
			</div>
		</nav>
	</header>



	<main>
