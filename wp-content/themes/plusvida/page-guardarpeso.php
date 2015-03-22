<?php
/**
 * Template Name: Guardar Pesos
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">



			<?php

			global $wpdb;
			$table_name = "usuarios_plusvida";
			$wpdb->insert( $table_name, array( 'usuario' => $_POST['usuario'], 'peso' => $_POST['peso'],
																					'fecha' => $_POST['fecha'], 'tipo-dia' => $_POST['tipo-dia']) );
			?>



			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
				<?php comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
