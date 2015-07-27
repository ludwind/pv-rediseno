
<?php
/**
 * Template Name: Bloqueados
 */
get_header(); ?>

<div class="usuarios-bloqueados">
<section>
	<h1>¡Aún no haz realizado tu pago! </h1>
	<span>POR FAVOR contáctate con administracion@pluvida.org para poder ingresar.</span>
	<article><a href="<?php echo wp_logout_url( home_url() ); ?>">Regresar</a></article>
<section>
</div>

<?php get_footer(); ?>
