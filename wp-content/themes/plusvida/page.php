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
<ul class="barGraph">

<?php




//$array = [[1, 2],[3, 4],];
//foreach ($array as list($a, $b)) {
		// $a contiene el primer elemento del array interior,
		// y $b contiene el segundo elemento.
	//	echo "A: $a; B: $b\n";}



	//$user_count = $wpdb->get_var( "SELECT peso FROM usuarios_plusvida WHERE usuario='echo get_current_user_id( )'" );
	//echo "<p>User count is {$user_count}</p>";
	$usuario = get_current_user_id( );
	$graficodb =  $wpdb->get_results( "SELECT * FROM pesos_plusvida WHERE usuario=$usuario ORDER BY fecha ASC" );


	if (is_array($graficodb))
	{
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
				<?php get_template_part( 'content', 'page' ); ?>
				<?php comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
