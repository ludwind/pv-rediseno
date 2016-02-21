
	<!-- -------------- Boton-pdf ----------------- -->
<div class="imprimirpdf">	<?php if(function_exists('mpdf_pdfbutton')) mpdf_pdfbutton(false, 'Guardar en PDF >', 'my login text'); ?></div>
	<!-- -------------- Boton-pdf ----------------- -->



	<!-- ------------------ Listar mis registros -------------------- -->

	<a href="#openModal" class="popupregistrosb">ver mis registros  ></a>

	<div id="openModal" class="modalDialog">
		<div>
			<a href="#close" title="Close" class="close">X</a>
			<div class="misregistros">
				<h1>Mis registros</h1>
				<?php
				$user_ID = $current_user->user_login;
				$files = glob( './pdf/'.$user_ID.'/*.*' );
				foreach ( $files as $file )	{
				echo'</br><a target="_blank" href="./' . $file . '">'. basename( $file ) . '</a><br />';
				}	?>
			<div>
		</div>
	</div>
<!-- ------------------ Listar mis registros -------------------- -->
