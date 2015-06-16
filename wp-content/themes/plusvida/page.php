
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

if(!empty($_POST['rangodias']))
	$ordernarPor = $_POST['rangodias'];
else
	$ordernarPor = '14';
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
	<span>Ver por el rango de:</span>
	<form action="" method=post>
		<select name="rangodias">
		<option value="14" selected>15 días</option>
		<option value="29">1 mes</option>
		<option value="89">3 meses</option>
		</select>
		<input type=submit value="Aplicar">
</form></aside></div>
<!----------------- selector de días ----------------- -->
<div class="estalasdepeso"><ul>
	<li>300 <?php echo "{$medidaGuardada}";?></li>
	<li>200 <?php echo "{$medidaGuardada}";?></li>
	<li>100 <?php echo "{$medidaGuardada}";?></li>
</ul></div>
<!----------------- grafico in ------------- -->
	<ul class="barGraph">

<!---------- primer_peso -------- -->
<li class="tooltips tipodiatexto0 ancho-grafico<?php echo $ordernarPor?>">
	<span><?php echo "{$primerafecha}";?><br>
		<?php echo "{$primerPeso}";?> <?php echo "{$medidaGuardada}";?></span>
	<div class="barrap">
	<div class="barrag set1 tipodia0" style="height:<?php echo "{$primerPeso}";?>px">
	</div><p><?php echo "{$primerafecha}";?></p>
	<footer><?php echo "{$primerPeso}";?> <?php echo "{$medidaGuardada}";?></footer></div></li>
<!---------- primer_peso -------- -->

<!---------- Todos los pesos -------- -->
	<?php

		$usuario = get_current_user_id( );
		$graficodb =  $wpdb->get_results( "SELECT * FROM (select * from pesos_plusvida WHERE usuario=$usuario order by fecha desc
			limit $ordernarPor ) tmp order by tmp.fecha asc" );

		if (is_array($graficodb))	{
				foreach ($graficodb as $datosgrafico)
				{ ?> <li class="tooltips tipodiatexto<?php echo $datosgrafico->tipodia ?> ancho-grafico<?php echo $ordernarPor?>">
					<span><?php echo $datosgrafico->fecha ?><br>
						<?php echo $datosgrafico->peso; ?><?php echo "{$medidaGuardada}";?></span>
					<div class="barrap">
					<div class="barrag set1 tipodia<?php echo $datosgrafico->tipodia ?>"
						style="height:<?php echo $datosgrafico->peso ?>px">
				</div><p><?php echo $datosgrafico->fecha ?></p><footer><?php echo $datosgrafico->peso; ?>
					<?php echo "{$medidaGuardada}";?></footer></div></li>
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
<div class="imprimirpdf">	<?php if(function_exists('mpdf_pdfbutton')) mpdf_pdfbutton(false, 'Guardar en PDF >', 'my login text'); ?></div>
	<!-- -------------- Boton-pdf ----------------- -->




<div class="misregistros">
<!-- ------------------ Listar mis registros -------------------- -->
	<?php
	$user_ID = $current_user->user_login;
	$files = glob( './pdf/'.$user_ID.'/*.*' );
	foreach ( $files as $file )	{
	echo'<a href="./' . $file . '">'. basename( $file ) . '</a><br />';
	}	?>
<!-- ------------------ Listar mis registros -------------------- -->
<div>


</section>
		<?php }?>


</div>

<!-- -------------------------- Audios --------------------------- -->
<div class="tabContent hide" id="grabaciones">
<header>Audio Conferencias</header>
<div class="reproductor"><section><div id="audiojs_wrapper0" classname="audiojs" class="audiojs">
	<audio src="audio.js_files/01-dead-wrong-intro.mp3" preload=""></audio>
	          <div class="play-pause"><p class="play"></p><p class="pause"></p><p class="loading"></p><p class="error"></p></div>
						<div class="scrubber"><div style="width: 5.26193px;" class="progress"></div>
						<div style="width: 14.6113px;" class="loaded"></div></div><div class="time"><em class="played">00:04</em>/<strong class="duration">03:57</strong></div>
						<div class="error-message"></div></div>
</section></div>
<div class="playlist">
	<div class="head-playlist"><ul><li>Nombre</li><li>Marcar como ya escuchada</li></ul></div>
<?php $myposts = get_posts(array('showposts' => -1,'post_type' => 'audioconferencias', 'orderby' => 'date', 	'order' => 'ASC')); $checkbox = 0;?>
<ol><?php foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
				<li><a href="#" data-src="<?php the_field("audio"); ?>"><?php $listado = ++$checkbox; echo $listado;?>. <?php the_title(); ?></a>
				</li><aside><input type="checkbox" id="option<?php echo $listado;?>"></aside><div class="lineadivisoria-audios"></div>
			<?php endforeach; wp_reset_postdata();?>
</ol></div>
<!--<div id="shortcuts"><div><h1>Keyboard shortcuts:</h1>	<p><em>→</em> Next track</p><p><em>←</em> Previous track</p><p><em>Space</em> Play/pause</p></div></div>-->
</div>

<!-- -------------------------- Conferencias go to meeting ------------------------------ -->
<div class="tabContent hide" id="conferencias">
	<header>Conferencias o reuniones en linea</header>
	<section>
		<img src="wp-content/themes/plusvida/img/usuarios/gotomeeting-logo.jpg"/>
		<p>Ingresa el número de reunión que te hemos brindando personalmente:</p>
		<center><script src="http://www.citrixonlinecdn.com/dtsimages/im/support/en/meetNowG.js" language="javascript" type="text/javascript"></script></center>
	</section>
</div>

<!-- -------------------------- Recomendaciones del doctor PlusVida ------------------------------ -->
<div class="tabContent hide" id="drpusvida">
	<header>Recomendaciones Dr. PlusVida</header>
<div class="recomendaciones-drpv">
	<?php $tiporecomendacion = get_field("recomendacionesdrpv");
	$recomendaciones = get_posts(array('showposts' => -1,'post_type' => 'recomendacionesdrpv', 'tax_query' => array(
		array( 'taxonomy' => 'porantiguedad', 'field' => 'slug', 'terms' => $tiporecomendacion )  )));?>
	<ul><?php foreach ( $recomendaciones as $post ) : setup_postdata( $post ); ?><li>
		<?php the_content( ); ?>
	</li> <?php endforeach; wp_reset_postdata();?></ul></div>
</div>

<!-- -------------------------- Contacto usuarios ------------------------------ -->
<div class="tabContent hide" id="contacto">
	<header>Contáctanos</header>
	<div class="contactousuarios"><ul>
		<li><h1>disponibles para ti</h1>Puedes contactarnos por cualquier duda sobre
nuestros servicios y tratamientos </br>Escríbenos:  <a href="mailto:contacto@plusvida.org">contacto@plusvida.org</a></li>
		<li><span>¿Tienes preguntas? escríbenos:</span></p>
			<div class="contactoform-usuario"><?php if( function_exists( 'ninja_forms_display_form' ) ){ ninja_forms_display_form( 12 ); } ?></div></li>
	</ul></div>
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

<!------------------------------ Audio Player ------------------------------- -->
<!--<script src="wp-content/themes/plusvida/js/jquery.js"></script>-->
<script src="wp-content/themes/plusvida/js/audio.js"></script>
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
<script src="http://cdn.jsdelivr.net/jquery.cookie/1.4.0/jquery.cookie.min.js"></script>

<script type="text/javascript">

$(function() {
		// Setup the player to autoplay the next track
		var a = audiojs.createAll({
			trackEnded: function() {
				var next = $('ol li.playing').next();
				if (!next.length) next = $('ol li').first();
				next.addClass('playing').siblings().removeClass('playing');
				audio.load($('a', next).attr('data-src'));
				audio.play();
			}
		});

		// Load in the first track
		var audio = a[0];
				first = $('ol a').attr('data-src');
		$('ol li').first().addClass('playing');
		audio.load(first);

		// Load in a track on click
		$('ol li').click(function(e) {
			e.preventDefault();
			$(this).addClass('playing').siblings().removeClass('playing');
			audio.load($('a', this).attr('data-src'));
			audio.play();
		});
		// Keyboard shortcuts
		$(document).keydown(function(e) {
			var unicode = e.charCode ? e.charCode : e.keyCode;
				// right arrow
			if (unicode == 39) {
				var next = $('li.playing').next();
				if (!next.length) next = $('ol li').first();
				next.click();
				// back arrow
			} else if (unicode == 37) {
				var prev = $('li.playing').prev();
				if (!prev.length) prev = $('ol li').last();
				prev.click();
				// spacebar
			} else if (unicode == 32) {
				audio.playPause();
			}
		})
	});

	/////////////////// checkbox //////////////////////////

	$("#checkAll").on("change", function() {
        $(':checkbox').not(this).prop('checked', this.checked);
      });

      $(":checkbox").on("change", function(){
        var checkboxValues = {};
        $(":checkbox").each(function(){
          checkboxValues[this.id] = this.checked;
        });
        $.cookie('checkboxValues', checkboxValues, { expires: 7, path: '/' })
      });

      function repopulateCheckboxes(){
        var checkboxValues = $.cookie('checkboxValues');
        if(checkboxValues){
          Object.keys(checkboxValues).forEach(function(element) {
            var checked = checkboxValues[element];
            $("#" + element).prop('checked', checked);
          });
        }
      }

      $.cookie.json = true;
      repopulateCheckboxes();

////////////////////////////// Tabs Script ///////////////////////////////////////


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
