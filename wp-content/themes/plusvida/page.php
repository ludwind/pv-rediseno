<?php
/**
 *
 */
?> 
<?php get_header(); ?>

<div class="usuasriostabs">
<div class="tabContent" id="mipeso">
<header>gráfica general de peso</header>

<?php
$usuario = get_current_user_id( );
$table_name = "primer_peso_plusvida";
$usuarioFechaInicial =  $wpdb->get_results( "SELECT usuario FROM primer_peso_plusvida WHERE usuario=$usuario" );

if (count($usuarioFechaInicial) == 0) { ?>

	<!-- ---------- Registro Primer Peso ---------------- -->
	<?php include_once( 'parts/users/widget-registro-primero-peso.php' ); ?>

<?php }	else{ ?>

	<?php
		$medidaGuardada =  $wpdb->get_var( "SELECT medidapeso FROM primer_peso_plusvida WHERE usuario=$usuario LIMIT 1" );
		$primerPeso =  $wpdb->get_var( "SELECT primerpeso FROM primer_peso_plusvida WHERE usuario=$usuario LIMIT 1" );
		$primerafecha =  $wpdb->get_var( "SELECT fecha FROM primer_peso_plusvida WHERE usuario=$usuario LIMIT 1" );
			if(!empty($_POST['rangodias']))
				$ordernarPor = $_POST['rangodias'];
			else
				$ordernarPor = '14';
	?>
	
	<!-- ---------- Registro de pesos normales ---------------- -->
	<?php include_once( 'parts/users/widget-registro-pesos-normales.php' ); ?>

	<section>
		<!----------------- selector de días ----------------- -->	
		<?php include_once( 'parts/users/selector-dias.php' ); ?>
	
		<!----------------- grafico in ------------- -->
		<?php include_once( 'parts/users/grafico.php' ); ?>
	
		<!----------------- mis registros y pdf ------------- -->
		<?php include_once( 'parts/users/registros-pdf.php' ); ?>
	</section>
<?php }?>


</div>

<!-- --------------- Audios ----------------- -->
<?php include_once( 'parts/users/audios.php' ); ?>


<!-- ------- Conferencias go to meeting ----------- -->
<?php include_once( 'parts/users/conferencias.php' ); ?>

<!-- -------------------------- Recomendaciones del doctor PlusVida ------------------------------ -->
<?php include_once( 'parts/users/doctorpv.php' ); ?>


<!-- -------------------------- Contacto usuarios ------------------------------ -->
<?php include_once( 'parts/users/contacto.php' ); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
<!-- -------------- Grafico php----------------- -->
<?php
function printGraph()
{
		$days = array();
		$xOffset = 0;
		$xIncrement = 40; // width of bars
		$graphHeight = 500; // target height of graph
		$maxResult = 1;
		$scale = 1;
		// Database Connection Information
		// Connect to and select the database
		// Get the data and find max values
		$result = mysql_query($query);
		if (!$result) die("no results available!");
		while($row = mysql_fetch_assoc($result)) {
				$days[$row['date']] = array( "P1" => $row['priority1']
						, "P2" => $row['priority2']
						, "P3" => $row['priority3']);
				//Check if this column is the largest
				$total = $row['total'];
				if($maxResult < $total) $maxResult = $total;
		}
		mysql_free_result($result);
		// Set the scale
		$scale = $graphHeight / $maxResult;
		echo '<ul class="TGraph">';
		foreach($days as $date => $values){
				// Reverse sort the array
				arsort($values);
				foreach($values as $priority => $num){
						// Scale the height to fit in the graph
						$height = ($num*$scale);
						// Print the Bar
						echo "<li class='$priority' style='height: ".$height."px; left: ".$xOffset."px;' title='$date'>$num<br />$priority</li>";
				}
				// Move on to the next column
				$xOffset = $xOffset + $xIncrement;
		}
		echo '</ul>';
}
?>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>

<!------------------------------ Audio Player ------------------------------- -->
<!--<script src="wp-content/themes/plusvida/js/jquery.js"></script>-->
<script src="wp-content/themes/plusvida/js/audio.js"></script>
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
<script src="http://cdn.jsdelivr.net/jquery.cookie/1.4.0/jquery.cookie.min.js"></script>

<!------------------------------ Customs JS ------------------------------- -->
<script type="text/javascript" src="wp-content/themes/plusvida/js/custom.js"></script>