
<?php
/**
 *
 */

get_header(); ?>

<div class="usuasriostabs">
<div class="tabContent" id="mipeso">
<header>gráfica general de peso</header>



	<?php
	$usuario = get_current_user_id( );
	$table_name = "primer_peso_plusvida";
	$usuarioFechaInicial =  $wpdb->get_results( "SELECT usuario FROM primer_peso_plusvida WHERE usuario=$usuario" );
	if (count($usuarioFechaInicial) == 0) { ?>

<aside class="asidesinpesos">
	<h1>¡Bienvenido a PlusVida!</h1>
	<span>comienza grabando tu peso inicial y medida que utilizaras para pesarte durante
		 el programa (libras o kilos):</span>

<form action="?page_id=48" method="post" class="formulario-pesos form-primer-peso">
		<input type="hidden" name="usuario-inicial" value="<?php echo get_current_user_id( ); ?>"/>
		<section><lable>Peso Inicial:</lable> <input class="intextpvpesos" vtype="number" name="primer-peso" min="1" max="350"/></section></br>
		<section><lable>Tipo de medida:</lable>
			<select name="medida">
			<option value="lbrs">Libras</option>
			<option value="kls">Kilogramos</option>
		</select></section></br>

		<input type="submit" value="Guardar >" class="guardarpeso">
		</form>

</aside>

		<?php }	else{
$medidaGuardada =  $wpdb->get_var( "SELECT medidapeso FROM primer_peso_plusvida WHERE usuario=$usuario LIMIT 1" );
$primerPeso =  $wpdb->get_var( "SELECT primerpeso FROM primer_peso_plusvida WHERE usuario=$usuario LIMIT 1" );
$primerafecha =  $wpdb->get_var( "SELECT fecha FROM primer_peso_plusvida WHERE usuario=$usuario LIMIT 1" );

			?>
<!-- -------------------------- Registro de pesos normales ------------------- -->
<aside>
				<span>Ingresa tu peso diario para poder visualizar el avance que haz obtenido</span>
				<form action="?page_id=12" method="post" class="formulario-pesos">
					<input type="hidden" name="usuario" value="<?php echo get_current_user_id( ); ?>"/>

				<section><lable>Peso:</lable>	<div class="medidapeso"> <?php echo "{$medidaGuardada}";?></div>
					 <input class="intextpvpesos pesoconmedida" vtype="number" name="peso" min="1" max="350"/></section></br>
					<section><lable>Fecha:</lable> <input class="intextpvpesos" type="text" name="fecha" id="datepicker">
					</section></br>

					<section>	<span>Tipo de dia:</span></br>
						<input type="radio" name="tipodia" value="1" checked class="tipodiapv ">
						<div class="biencuidado"> Día bien cuidado</div><br>
						<input type="radio" name="tipodia" value="2" class="tipodiapv ">
						<div class="desborde"> Día con desborde</div><br>
					</section></br>
					<input type='hidden' id='myInput' name='previus' value='".$_SERVER['PHP_SELF']."' />
				<input type="submit" value="Guardar >" class="guardarpeso">
				</form>
</aside>
<section>

<!----------------- selector de días ----------------- -->
<div class="selectordedias"><aside>
	<span>Seleciona días:</span>
	<form action="" method=post>
		<select name="rangodias">
		<option value="1">1 día</option>
		<option value="15" selected>15 días</option>
		<option value="30">30 día</option>
		<option value="45">45 día</option>
		</select>
		<input type=submit value="Go">
</form></aside></div>
<!----------------- selector de días ----------------- -->

<!----------------- grafico in ------------- -->
	<ul class="barGraph">

<!---------- primer_peso -------- -->
<li><div class="barrag set1 tipodia0" style="height:<?php echo "{$primerPeso}";?>px">
	<?php echo "{$primerPeso}";?></div></br><span><?php echo "{$primerafecha}";?></span></li>
<!---------- primer_peso -------- -->

<!---------- Todos los pesos -------- -->
	<?php
		//$ordernarPor = //$_POST['rangodias'];
		if(!empty($_POST['rangodias']))
			$ordernarPor = $_POST['rangodias'];
		else
			$ordernarPor = '15';
		$usuario = get_current_user_id( );
		$graficodb =  $wpdb->get_results( "SELECT * FROM (select * from pesos_plusvida WHERE usuario=$usuario order by fecha desc
			limit $ordernarPor ) tmp order by tmp.fecha asc" );
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
	?>
<!---------- Fin todos los pesos -------- -->
	</ul>
<!-- -------------- Fin grafico ----------------- -->


	<!-- -------------- Boton-pdf ----------------- -->
	<?php if(function_exists('mpdf_pdfbutton')) mpdf_pdfbutton(false, 'my link', 'my login text'); ?>
	<!-- -------------- Boton-pdf ----------------- -->

</section>
		<?php }?>

</div>

<div class="tabContent hide" id="grabaciones">
mis grabaciones
</div>

<div class="tabContent hide" id="conferencias">
conferencias
</div>

<div class="tabContent hide" id="drpusvida">
dr plusvida
</div>

<div class="tabContent hide" id="contacto">
contacto
</div>
</div>


	<div id="primary" class="site-content">
		<div id="content" role="main">








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








		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>

<!------------------------------ Tabs Script ------------------------------- -->

<script type="text/javascript">
//<![CDATA[

var tabLinks = new Array();
var contentDivs = new Array();

function init() {

	// Grab the tab links and content divs from the page
	var tabListItems = document.getElementById('tabs').childNodes;
	for ( var i = 0; i < tabListItems.length; i++ ) {
		if ( tabListItems[i].nodeName == "LI" ) {
			var tabLink = getFirstChildWithTagName( tabListItems[i], 'A' );
			var id = getHash( tabLink.getAttribute('href') );
			tabLinks[id] = tabLink;
			contentDivs[id] = document.getElementById( id );
		}
	}

	// Assign onclick events to the tab links, and
	// highlight the first tab
	var i = 0;

	for ( var id in tabLinks ) {
		tabLinks[id].onclick = showTab;
		tabLinks[id].onfocus = function() { this.blur() };
		if ( i == 0 ) tabLinks[id].className = 'selected';
		i++;
	}

	// Hide all content divs except the first
	var i = 0;

	for ( var id in contentDivs ) {
		if ( i != 0 ) contentDivs[id].className = 'tabContent hide';
		i++;
	}
}

function showTab() {
	var selectedId = getHash( this.getAttribute('href') );

	// Highlight the selected tab, and dim all others.
	// Also show the selected content div, and hide all others.
	for ( var id in contentDivs ) {
		if ( id == selectedId ) {
			tabLinks[id].className = 'selected';
			contentDivs[id].className = 'tabContent';
		} else {
			tabLinks[id].className = '';
			contentDivs[id].className = 'tabContent hide';
		}
	}

	// Stop the browser following the link
	return false;
}

function getFirstChildWithTagName( element, tagName ) {
	for ( var i = 0; i < element.childNodes.length; i++ ) {
		if ( element.childNodes[i].nodeName == tagName ) return element.childNodes[i];
	}
}

function getHash( url ) {
	var hashPos = url.lastIndexOf ( '#' );
	return url.substring( hashPos + 1 );
}

//]]>
</script>
