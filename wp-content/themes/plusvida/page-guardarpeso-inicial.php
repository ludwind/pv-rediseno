<?php
/**
 * Template Name: Guardar Peso Inicial
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

<?php

global $wbpd;
$table_name = "primer_peso_plusvida";
$wpdb->insert( $table_name, array( 'usuario' => $_POST['usuario-inicial'], 'primerpeso' => $_POST['primer-peso'],
																		'fecha' => current_time('mysql', 1), 'medidapeso' => $_POST['medida']) );?>


			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
				<?php comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->



	<?php
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	get_footer(); ?>
