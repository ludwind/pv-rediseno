<?php
/**
 * Template Name: Guardar Peso Inicial
 */

get_header(); ?>
<head>
 <link rel="stylesheet" type="text/css" href="wp-content/themes/plusvida/style.css">
</head>


<?php

global $wbpd;
$table_name = "primer_peso_plusvida";
$wpdb->insert( $table_name, array( 'usuario' => $_POST['usuario-inicial'], 'primerpeso' => $_POST['primer-peso'],
																		'fecha' => current_time('mysql', 1), 'medidapeso' => $_POST['medida']) );?>

<div class="peso-guardado"><section>
			Primer peso Guardado exitosamente
</div></section>



		</div><!-- #content -->
	</div><!-- #primary -->


		<script>
	window.location.href = document.referrer;
		</script>

	<?php
	get_footer(); ?>
