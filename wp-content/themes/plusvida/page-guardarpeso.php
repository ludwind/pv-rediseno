<?php
/**
 * Template Name: Guardar Pesos
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

<?php

$usuario = get_current_user_id( );
$fechaPorGuardar = $_POST['fecha'];
$table_name = "pesos_plusvida";
$fechaDePeso =  $wpdb->get_col( "SELECT fecha FROM pesos_plusvida WHERE usuario=$usuario" );
/////////////////////// si el peso ya existe y hay que sobre escribirlo
if (in_array($_POST['fecha'], $fechaDePeso)){?>
<script>
	confirm("¡Peso ya guardado! ¿Deseas sobre escribirlo?");
</script>
<?php
global $wbpd;
$wpdb->show_errors();
//$wpdb->query($wpdb->prepare("DELETE FROM pesos_plusvida WHERE usuario = '%d' AND fecha = '%c'", $usuario, $fechaPorGuardar));
$wpdb->delete( $table_name, array( 'fecha' => $fechaPorGuardar, 'usuario' => $usuario));
//echo $fechaPorGuardar;


$wpdb->insert( $table_name, array( 'usuario' => $_POST['usuario'], 'peso' => $_POST['peso'],
																		'fecha' => $_POST['fecha'], 'tipodia' => $_POST['tipodia']) );?>


¡Peso sobre-escrito exitosamente!

<?php
/////////////////////////// si el peso no existe y solo lo guardará
 }	else{
		global $wpdb;
		$table_name = "pesos_plusvida";
		$wpdb->insert( $table_name, array( 'usuario' => $_POST['usuario'], 'peso' => $_POST['peso'],
																				'fecha' => $_POST['fecha'], 'tipodia' => $_POST['tipodia']) );?>
Guardado exitosamente

<input type="hidden" name="guardarpeso" value="pesoguardado"/>

<?php } ?>



			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
				<?php comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->


	<?php
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	get_footer(); ?>
