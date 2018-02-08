<?php
/**
 * The template for displaying the footer
 * @package Aiate
 */
?>
	</main><!-- #content -->

	<footer>
		<div class="newsletter-social">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<h4>Newsletter</h4>
						<p class="info">Escribe tu correo para suscribirte a nuestro Newsletter</p>
						<?php echo do_shortcode( '[contact-form-7 id="646" title="Mailchimp"]' ); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="shop-info">
			<div class="container-fluid">
				<div class="row align-center">
					<div class="col-xs-12 col-md-4">
						<img src="<?php bloginfo('template_url'); ?>/dist/assets/img/logo-white.png" alt="aiate-logo">
					</div>
					<div class="col-xs-12 col-md-4">
						<span>Tienda</span>
						<p>
							Calle Trajano 29 <br>
							41002 Sevilla <br>
							955 463 453 <br>
							hola@aiatecompany.com <br>
							10:00h - 14:00h y 17:30h - 21:00h
							
						</p>
					</div>
					<div class="col-xs-12 col-md-4">
						<a href="/contacto">Contacto</a>
						<a href="https://www.facebook.com/aiatecompany/">Facebook</a>
						<a href="https://www.instagram.com/aiatecompany/">Instagram</a>
						<a href="/envios-y-devoluciones">Envíos y devoluciones</a>
						<a href="/terminos-y-condiciones">Términos y condiciones</a>
						<br>
					</div>
				</div>
			</div>
		</div>
	</footer>

<?php wp_footer(); ?>

<script src="<?php bloginfo('template_url'); ?>/dist/assets/js/static/jquery.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/dist/assets/js/static/glide.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/dist/assets/js/static/mui.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/dist/assets/js/custom.min.js"></script>

</body>
</html>
