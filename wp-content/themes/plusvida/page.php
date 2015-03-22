<?php
/**
 *
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<form action="?page_id=12" method="post">
				<input type="hidden" name="usuario" value="<?php echo get_current_user_id( ); ?>"/>
			Peso: <input type="number" name="peso" min="1" max="350"/></br>
			Fecha: <input type="text" name="fecha" id="datepicker"></br>
			Tipo de dia:</br>
				<input type="radio" name="tipo-dia" value="1" checked> Día bien cuidado<br>
				<input type="radio" name="tipo-dia" value="2"> Día con desborde<br>
			</br>
			<input type="submit">
			</form>


<!-- -------------- Grafico ----------------- -->
<?php
	//$user_count = $wpdb->get_var( "SELECT peso FROM usuarios_plusvida WHERE usuario='echo get_current_user_id( )'" );
	//echo "<p>User count is {$user_count}</p>";
	$usuario = get_current_user_id( );
	$peso =  $wpdb->get_col( "SELECT peso FROM usuarios_plusvida WHERE usuario=$usuario" );

	if (is_array($peso))
	{
	    foreach ($peso as $pesos)
	    {
	        echo $pesos;
	    }
	}
	else if (!is_array($peso))
	{
		echo $peso;
	}
	else
	{
		echo 'No tienes ningún peso guardado aún';
	}


?>
<!-- -------------- Grafico ----------------- -->


			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
				<?php comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
