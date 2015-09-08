<?php
/**
 * Template Name: Guardar Audios
 */

?>

<head>
 <link rel="stylesheet" type="text/css" href="wp-content/themes/plusvida/style.css">
</head>


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

<div class="peso-guardado"><section>
Guardado exitosamente
</div></section>

<script>
window.location.href = document.referrer;
</script>

	<?php 	get_footer(); ?>
