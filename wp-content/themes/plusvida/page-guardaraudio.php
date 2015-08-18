<?php
/**
 * Template Name: Guardar Audios
 */

?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

<?php
/////////////////////// Variables ///////////////////////
$usuario = get_current_user_id( );
$idAudio = $_POST['id-audio'];
$table_name = "audios_plusvida";
////////////// Grabar audios seleccionados //////////////////
global $wpdb;
foreach ( $_POST['id-audio'] as $myaudioId) {
		$wpdb->insert( $table_name, array( 'idusuario' => $_POST['id-usuario'], 'idaudio' => $myaudioId) );
}
////////// Eliminar audios no seleccionaedos ///////////////
$todosLosAudios =  $wpdb->get_col( "SELECT idaudio FROM audios_plusvida WHERE idusuario=$usuario" );
if ($todosLosAudios != $idAudio)
	$wpdb->delete( $table_name, array( 'idusuario' => $_POST['id-usuario']));
	foreach ( $_POST['id-audio'] as $myaudioId) {
			$wpdb->insert( $table_name, array( 'idusuario' => $_POST['id-usuario'], 'idaudio' => $myaudioId) );
	}
?>
Guardado exitosamente

<input type="hidden" name="guardarpeso" value="pesoguardado"/>

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
				<?php comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->


	<?php
	 header('Location: ' . $_SERVER['HTTP_REFERER']);
	get_footer(); ?>
