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
				<input type="radio" name="tipodia" value="1" checked> Día bien cuidado<br>
				<input type="radio" name="tipodia" value="2"> Día con desborde<br>
			</br>
			<input type="submit">
			</form>


<!-- -------------- Grafico ----------------- -->

Seleeciona días:
<form action="" method=post>
	<select name="rangodias">
	<option value="1">1 día</option>
	<option value="15">15 días</option>
	</select>
	<input type=submit value="Go">
</form>

<ul class="barGraph">
<?php
	//$ordernarPor = //$_POST['rangodias'];
	if(!empty($_POST['rangodias']))
		$ordernarPor = $_POST['rangodias'];
	else
		$ordernarPor = '1';


	$usuario = get_current_user_id( );
	$graficodb =  $wpdb->get_results( "SELECT * FROM (select * from pesos_plusvida WHERE usuario=$usuario order by fecha desc limit $ordernarPor
) tmp order by tmp.fecha asc" );
//	$graficodb =  $wpdb->get_results( "SELECT * FROM pesos_plusvida WHERE usuario=$usuario ORDER BY fecha ASC limit 2" );
	if (is_array($graficodb))	{
	    foreach ($graficodb as $datosgrafico)
	    { ?> <li><div class="barrag set1 tipodia<?php echo $datosgrafico->tipodia ?>" style="height:<?php echo $datosgrafico->peso ?>px">
				<?php echo $datosgrafico->peso; ?></div></br><span><?php echo $datosgrafico->fecha ?></span></li>
					<?php }
	}
	else if (!is_array($datosgrafico))
	{
		echo $datosgrafico;
	}
	else
	{
		echo 'No tienes ningún peso guardado aún';
	}


?> </ul>
<!-- -------------- Grafico ----------------- -->




<?php
///////////////////// Grafico php
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
//////////////////////////////// Fin Grafico php
?>




			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content-usuarios', 'page' ); ?>
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
