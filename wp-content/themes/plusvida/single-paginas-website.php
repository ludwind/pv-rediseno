<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 *
 */?>


<?php if ( is_user_logged_in() ) {?>
	<meta http-equiv="Location" content="<?php echo wp_logout_url( home_url() ); ?>">
<?php } ?>

<?php get_header(); ?>



<div class="front-headtitular">

<section><?php $image = get_field('imagen_principal'); if( !empty($image) ): ?>
	<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
<?php endif; ?></section>

<aside>
<article><?php the_field('titulo-celeste'); ?>
	<span><?php the_field('titulo-blanco'); ?></span></article>
<?php the_field('descripcion-pagina'); ?>
<div class="front-botonlink">
<a href="<?php the_field('enlace_de_boton'); ?>"><?php the_field('nombre_en_boton'); ?></a>
</div>
</aside>

</div>
<div class="contenidofront">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content-paginas-website', get_post_format() ); ?>
</div>


				<?php comments_template( '', true ); ?>

			<?php endwhile; // end of the loop. ?>



<?php get_footer(); ?>
