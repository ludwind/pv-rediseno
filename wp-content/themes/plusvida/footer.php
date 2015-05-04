<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
<!-- --- suscribe -------- -->
<?php if ( is_user_logged_in() ) {?>
<?php } ?>
<?php if ( !is_user_logged_in() ) {?>
	<?php if (!is_single('36')) { ?>
	<div class="suscribe"><ul>
		<li>Consejos y</br><span>Promociones</span></li>
		<li><?php if( function_exists( 'ninja_forms_display_form' ) ){ ninja_forms_display_form( 5 ); } ?></li>
	</ul></div>
	<?php } ?>
<?php } ?>




	<footer>
<ul>

<!-- ---------- footer users -------------- -->
	<?php if ( is_user_logged_in() ) {?>
		<li><ul>
			<li><a href="<?php echo wp_logout_url( home_url() ); ?>">Inicio</a></li>
			<li><a href="<?php echo wp_logout_url( home_url('?paginas-website=de-que-se-trata') ); ?>">¿Cómo funciona?</a></li>
			<li><a href="<?php echo wp_logout_url( home_url('?paginas-website=login') ); ?>">Ingreso a miembros</a></li>
			<li><a href="<?php echo wp_logout_url( home_url('?paginas-website=de-que-se-trata') ); ?>">¿De qué se trata?</a></li>
			<li><a href="<?php echo wp_logout_url( home_url('?paginas-website=contacto') ); ?>">Contacto</a></li>
			<li><a href="<?php echo wp_logout_url( home_url('?paginas-website=contacto#incribete') ); ?>">¿Aún no eres miembro?</a></li>
		</ul></li>
	<?php } ?>
<!-- ----------- footer public -------------- -->
	<?php if ( !is_user_logged_in() ) {	 ?>
	<li><ul>
		<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Inicio</a></li>
		<li><a href="?paginas-website=como-funciona">¿Cómo funciona?</a></li>
		<li><a href="?paginas-website=login">Ingreso a miembros</a></li>
		<li><a href="?paginas-website=de-que-se-trata">¿De qué se trata?</a></li>
		<li><a href="?paginas-website=contacto">Contacto</a></li>
		<li><a href="?paginas-website=contacto#incribete">¿Aún no eres miembro?</a></li>
	</ul></li>
<?php } ?>

	<li><a href="mailto:contacto@plusvida.org">contacto@plusvida.org</a></li>
</ul>
<section>Plusvida © 2015</section>
	</footer><!-- #colophon -->

	</div><!-- #main .wrapper -->
</div><!-- #page -->

<!-- ---------------- DATE PICKER ------------------ -->
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<!-- ---------------- DATE PICKER ------------------ -->

<script>

///////// DATE PICKER ///////////
  $(function() {
    $( "#datepicker" ).datepicker({
   dateFormat: 'yy-mm-dd'
});

  });
///////// DATE PICKER ///////////

</script>

<?php wp_footer(); ?>
</body>
</html>
