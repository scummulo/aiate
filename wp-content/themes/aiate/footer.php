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
						<input type="text" placeholder="Escribe tu correo electrónico" name="" value="">
						<p>Suscríbete a nuestro newsletter para estar al día de todas nuestras novedades y ofertas</p>
						<a href="https://www.facebook.com/aiatecompany/">Facebook</a>
						<a href="https://www.instagram.com/aiatecompany/">Instagram</a>
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
							666 777 888 <br>
							hello@aiatecompany.com <br>
							10:00h - 14:00h y 17:30h - 21:00h
							
						</p>
					</div>
					<div class="col-xs-12 col-md-4">
						<a href="#">Contacto</a>
						<a href="#">FAQs</a>
						<a href="#">Envíos</a>
						<a href="#">Devoluciones</a>
						<a href="#">Políticas de privacidad</a>
						<a href="#">Términos y condiciones</a>
					</div>
				</div>
			</div>
		</div>
	</footer>

<?php wp_footer(); ?>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZTZdzvaX5GMGOeYQNpgcq5H72Lvc8KQk&callback=initMap"></script>
<script src="<?php bloginfo('template_url'); ?>/dist/assets/js/static/jquery.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/dist/assets/js/static/glide.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/dist/assets/js/static/mui.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/dist/assets/js/custom.min.js"></script>

</body>
</html>
