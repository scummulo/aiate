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

					<!-- Search -->
					<div class="search-wrapper">
						<a id="toggle-search">Buscador</a>
						<div id="search">
							<form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
								<div class="mui-textfield">
									<label class="screen-reader-text" for="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>"><?php _e( 'Search for:', 'woocommerce' ); ?></label>
									<input type="search" id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>" class="search-field" placeholder="<?php echo esc_attr__( 'Search products&hellip;', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
								</div>
							</form>
						</div>
					</div>

					<!-- Cart -->
					<?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
						$count = WC()->cart->cart_contents_count;?>
						<div class="cart-wrapper">
							<a class="cart-menu" id="toggle-cart">Cesta
							<?php if ( $count > 0 ) { ?>
								<div class="circle">
									<span class="cart-menu-items"><?php echo esc_html( $count ); ?></span>
								</div>
							<?php }	?>
							</a>
							<!-- Cart  -->
							<div id="cart" class="woocommerce cart">
								<div class="cart-products">
									<h2>Productos</h2>
									<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
										<?php do_action( 'woocommerce_before_cart_table' ); ?>
									
										<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
											<thead>
												<tr>
													<th class="product-remove">&nbsp;</th>
													<th class="product-name"><?php _e( 'Product', 'woocommerce' ); ?></th>
													<th class="product-price"><?php _e( 'Price', 'woocommerce' ); ?></th>
													<th class="product-quantity"><?php _e( 'Quantity', 'woocommerce' ); ?></th>
													<th class="product-subtotal"><?php _e( 'Total', 'woocommerce' ); ?></th>
												</tr>
											</thead>
											<tbody>
												<?php do_action( 'woocommerce_before_cart_contents' ); ?>
									
												<?php
												foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
													$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
													$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
									
													if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
														$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
														?>
														<tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
									
															<td class="product-remove">
																<?php
																	echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
																		'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
																		esc_url( WC()->cart->get_remove_url( $cart_item_key ) ),
																		__( 'Remove this item', 'woocommerce' ),
																		esc_attr( $product_id ),
																		esc_attr( $_product->get_sku() )
																	), $cart_item_key );
																?>
															</td>
									
															<td class="product-name" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
																<?php
																	if ( ! $product_permalink ) {
																		echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;';
																	} else {
																		echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key );
																	}
									
																	// Meta data
																	echo WC()->cart->get_item_data( $cart_item );
									
																	// Backorder notification
																	if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
																		echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>';
																	}
																?>
															</td>
									
															<td class="product-price" data-title="<?php esc_attr_e( 'Price', 'woocommerce' ); ?>">
																<?php
																	echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
																?>
															</td>
									
															<td class="product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
																<?php
																	if ( $_product->is_sold_individually() ) {
																		$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
																	} else {
																		$product_quantity = woocommerce_quantity_input( array(
																			'input_name'  => "cart[{$cart_item_key}][qty]",
																			'input_value' => $cart_item['quantity'],
																			'max_value'   => $_product->get_max_purchase_quantity(),
																			'min_value'   => '0',
																		), $_product, false );
																	}
									
																	echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
																?>
															</td>
									
															<td class="product-subtotal" data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>">
																<?php
																	echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
																?>
															</td>
														</tr>
														<?php
													}
												}
												?>
									
												<?php do_action( 'woocommerce_cart_contents' ); ?>
									
												<tr>
													<td colspan="6" class="actions">
									
														<?php if ( wc_coupons_enabled() ) { ?>
															<div class="coupon">
																<label for="coupon_code"><?php _e( 'Coupon:', 'woocommerce' ); ?></label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" /> <input type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>" />
																<?php do_action( 'woocommerce_cart_coupon' ); ?>
															</div>
														<?php } ?>
									
														<input type="submit" class="button update" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>" />
									
														<?php do_action( 'woocommerce_cart_actions' ); ?>
									
														<?php wp_nonce_field( 'woocommerce-cart' ); ?>
													</td>
												</tr>
									
												<?php do_action( 'woocommerce_after_cart_contents' ); ?>
											</tbody>
										</table>
										<?php do_action( 'woocommerce_after_cart_table' ); ?>
									</form>
								</div>
								
								<div class="cart-total">
									<div class="cart-collaterals">
										<?php
											/**
											 * woocommerce_cart_collaterals hook.
											 *
											 * @hooked woocommerce_cross_sell_display
											 * @hooked woocommerce_cart_totals - 10
											 */
											do_action( 'woocommerce_cart_collaterals' );
										?>
									</div>
								</div>
							</div>
							<!-- End Cart -->	
						</div>
					<?php } ?>
					
								
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
		
