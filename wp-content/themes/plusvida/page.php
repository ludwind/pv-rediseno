
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
<input name="referer" type="hidden" value="<?php echo urlencode($_SERVER['HTTP_REFERER']) ?>" />
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
					 <input class="intextpvpesos pesoconmedida" vtype="number" name="peso" min="1" max="350"
					maxlength="6"/>
				 </section></br>
					<section><lable>Fecha:</lable> <input class="intextpvpesos" type="text" name="fecha" id="datepicker">
					</section></br>

					<section>	<span>Tipo de dia:</span></br>
						<input type="radio" name="tipodia" value="1" id="tipodia1" checked class="tipodiapv ">
						<div class="biencuidado"> <label for="tipodia1">Día bien cuidado</label></div><br>
						<input type="radio" name="tipodia" value="2" id="tipodia2" class="tipodiapv ">
						<div class="desborde"> <label for="tipodia2">Día con desborde</label></div><br>
					</section></br>
					<input type='hidden' id='myInput' name='previus' value='".$_SERVER['PHP_SELF']."' />
<input name="referer" type="hidden" value="<?php echo urlencode($_SERVER['HTTP_REFERER']) ?>" />
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
<?php $audiosCheckbox =  $wpdb->get_col( "SELECT idaudio FROM audios_plusvida WHERE idusuario=$usuario" );?>


	<?php
	$contadorAudios = 1;
	 $myposts = get_posts(array('showposts' => 100,'post_type' => 'audioconferencias', 'orderby' => 'date',
	'order' => 'DESC'));?>
<?php if (isset($myposts[0])) { ?>
<section><h1>Grabaciones de 1 a 100</h1>
<div class="head-playlist"><ul><li>Nombre</li><li>Marcar como ya escuchada</li></ul></div>
<form action="?page_id=1940" method="post" class="formulario-pesos"><ol>
	<input type="hidden" name="id-usuario" value="<?php echo get_current_user_id( ); ?>"/>
		<?php foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
				<li><a href="#" data-src="<?php the_field("audio"); ?>">
					 <?php echo $contadorAudios++ .'. '; the_title(); ?></a>
				</li><aside>
					<?php $idaudios = get_the_ID(); ?><input type="checkbox" name="id-audio[]" value="<?php echo $idaudios; ?>"
					<?php if (in_array($idaudios, $audiosCheckbox )) echo 'checked';?>>
					 </aside>
				<div class="lineadivisoria-audios"></div>
			<?php endforeach; wp_reset_postdata();?>
</ol></form>
<input type="submit" value="Guardar >" class="guardarpeso"></section>
<?php } ?>


<?php $myposts2 = get_posts(array('showposts' => 100, 'offset' => 100, 'post_type' => 'audioconferencias', 'orderby' => 'date',
	'order' => 'DESC'));?>
	<?php if (isset($myposts2[0])) { ?>
<section><h1>Grabaciones de 101 a 200</h1>
<div class="head-playlist"><ul><li>Nombre</li><li>Marcar como ya escuchada</li></ul></div>
<form action="?page_id=1940" method="post" class="formulario-pesos"><ol>
	<input type="hidden" name="id-usuario" value="<?php echo get_current_user_id( ); ?>"/>
		<?php foreach ( $myposts2 as $post ) : setup_postdata( $post ); ?>
				<li><a href="#" data-src="<?php the_field("audio"); ?>">
					 <?php echo $contadorAudios++ .'. '; the_title(); ?></a>
				</li><aside>
					<?php $idaudios = get_the_ID(); ?><input type="checkbox" name="id-audio[]" value="<?php echo $idaudios; ?>"
					<?php if (in_array($idaudios, $audiosCheckbox )) echo 'checked';?>>
					 </aside>
				<div class="lineadivisoria-audios"></div>
			<?php endforeach; wp_reset_postdata();?>
<input type='hidden' id='myInput' name='previus' value='".$_SERVER['PHP_SELF']."' />
</ol></form>
<input type="submit" value="Guardar >" class="guardarpeso"></section>
<?php } ?>


<?php $myposts3 = get_posts(array('showposts' => 100, 'offset' => 200, 'post_type' => 'audioconferencias', 'orderby' => 'date',
	'order' => 'DESC'));?>
	<?php if (isset($myposts3[0])) { ?>
<section><h1>Grabaciones de 201 a 300</h1>
<div class="head-playlist"><ul><li>Nombre</li><li>Marcar como ya escuchada</li></ul></div>
<form action="?page_id=1940" method="post" class="formulario-pesos"><ol>
	<input type="hidden" name="id-usuario" value="<?php echo get_current_user_id( ); ?>"/>
		<?php foreach ( $myposts3 as $post ) : setup_postdata( $post ); ?>
				<li><a href="#" data-src="<?php the_field("audio"); ?>">
					 <?php echo $contadorAudios++ .'. '; the_title(); ?></a>
				</li><aside>
					<?php $idaudios = get_the_ID(); ?><input type="checkbox" name="id-audio[]" value="<?php echo $idaudios; ?>"
					<?php if (in_array($idaudios, $audiosCheckbox )) echo 'checked';?>>
					 </aside>
				<div class="lineadivisoria-audios"></div>
			<?php endforeach; wp_reset_postdata();?>
<input type='hidden' id='myInput' name='previus' value='".$_SERVER['PHP_SELF']."' />
</ol></form>
<input type="submit" value="Guardar >" class="guardarpeso"></section>
<?php } ?>


<?php $myposts4 = get_posts(array('showposts' => 100, 'offset' => 300, 'post_type' => 'audioconferencias', 'orderby' => 'date',
	'order' => 'DESC'));?>
	<?php if (isset($myposts4[0])) { ?>
<section><h1>Grabaciones de 301 a 400</h1>
<div class="head-playlist"><ul><li>Nombre</li><li>Marcar como ya escuchada</li></ul></div>
<form action="?page_id=1940" method="post" class="formulario-pesos"><ol>
	<input type="hidden" name="id-usuario" value="<?php echo get_current_user_id( ); ?>"/>
		<?php foreach ( $myposts4 as $post ) : setup_postdata( $post ); ?>
				<li><a href="#" data-src="<?php the_field("audio"); ?>">
					 <?php echo $contadorAudios++ .'. '; the_title(); ?></a>
				</li><aside>
					<?php $idaudios = get_the_ID(); ?><input type="checkbox" name="id-audio[]" value="<?php echo $idaudios; ?>"
					<?php if (in_array($idaudios, $audiosCheckbox )) echo 'checked';?>>
					 </aside>
				<div class="lineadivisoria-audios"></div>
			<?php endforeach; wp_reset_postdata();?>
<input type='hidden' id='myInput' name='previus' value='".$_SERVER['PHP_SELF']."' />
</ol></form>
<input type="submit" value="Guardar >" class="guardarpeso"></section>
<?php } ?>


<?php $myposts5 = get_posts(array('showposts' => 100, 'offset' => 400, 'post_type' => 'audioconferencias', 'orderby' => 'date',
	'order' => 'DESC'));?>
	<?php if (isset($myposts5[0])) { ?>
<section><h1>Grabaciones de 401 a 500</h1>
<div class="head-playlist"><ul><li>Nombre</li><li>Marcar como ya escuchada</li></ul></div>
<form action="?page_id=1940" method="post" class="formulario-pesos"><ol>
	<input type="hidden" name="id-usuario" value="<?php echo get_current_user_id( ); ?>"/>
		<?php foreach ( $myposts5 as $post ) : setup_postdata( $post ); ?>
				<li><a href="#" data-src="<?php the_field("audio"); ?>">
					 <?php echo $contadorAudios++ .'. '; the_title(); ?></a>
				</li><aside>
					<?php $idaudios = get_the_ID(); ?><input type="checkbox" name="id-audio[]" value="<?php echo $idaudios; ?>"
					<?php if (in_array($idaudios, $audiosCheckbox )) echo 'checked';?>>
					 </aside>
				<div class="lineadivisoria-audios"></div>
			<?php endforeach; wp_reset_postdata();?>
<input type='hidden' id='myInput' name='previus' value='".$_SERVER['PHP_SELF']."' />
</ol></form>
<input type="submit" value="Guardar >" class="guardarpeso"></section>
<?php } ?>


<?php $myposts6 = get_posts(array('showposts' => 100, 'offset' => 500, 'post_type' => 'audioconferencias', 'orderby' => 'date',
	'order' => 'DESC'));?>
	<?php if (isset($myposts6[0])) { ?>
<section><h1>Grabaciones de 501 a 600</h1>
<div class="head-playlist"><ul><li>Nombre</li><li>Marcar como ya escuchada</li></ul></div>
<form action="?page_id=1940" method="post" class="formulario-pesos"><ol>
	<input type="hidden" name="id-usuario" value="<?php echo get_current_user_id( ); ?>"/>
		<?php foreach ( $myposts6 as $post ) : setup_postdata( $post ); ?>
				<li><a href="#" data-src="<?php the_field("audio"); ?>">
					 <?php echo $contadorAudios++ .'. '; the_title(); ?></a>
				</li><aside>
					<?php $idaudios = get_the_ID(); ?><input type="checkbox" name="id-audio[]" value="<?php echo $idaudios; ?>"
					<?php if (in_array($idaudios, $audiosCheckbox )) echo 'checked';?>>
					 </aside>
				<div class="lineadivisoria-audios"></div>
			<?php endforeach; wp_reset_postdata();?>
<input type='hidden' id='myInput' name='previus' value='".$_SERVER['PHP_SELF']."' />
</ol></form>
<input type="submit" value="Guardar >" class="guardarpeso"></section>
<?php } ?>


<?php $myposts7 = get_posts(array('showposts' => 100, 'offset' => 600, 'post_type' => 'audioconferencias', 'orderby' => 'date',
	'order' => 'DESC'));?>
	<?php if (isset($myposts7[0])) { ?>
<section><h1>Grabaciones de 601 a 700</h1>
<div class="head-playlist"><ul><li>Nombre</li><li>Marcar como ya escuchada</li></ul></div>
<form action="?page_id=1940" method="post" class="formulario-pesos"><ol>
	<input type="hidden" name="id-usuario" value="<?php echo get_current_user_id( ); ?>"/>
		<?php foreach ( $myposts7 as $post ) : setup_postdata( $post ); ?>
				<li><a href="#" data-src="<?php the_field("audio"); ?>">
					 <?php echo $contadorAudios++ .'. '; the_title(); ?></a>
				</li><aside>
					<?php $idaudios = get_the_ID(); ?><input type="checkbox" name="id-audio[]" value="<?php echo $idaudios; ?>"
					<?php if (in_array($idaudios, $audiosCheckbox )) echo 'checked';?>>
					 </aside>
				<div class="lineadivisoria-audios"></div>
			<?php endforeach; wp_reset_postdata();?>
<input type='hidden' id='myInput' name='previus' value='".$_SERVER['PHP_SELF']."' />
</ol></form>
<input type="submit" value="Guardar >" class="guardarpeso"></section>
<?php } ?>



<?php $myposts8 = get_posts(array('showposts' => 100, 'offset' => 700, 'post_type' => 'audioconferencias', 'orderby' => 'date',
	'order' => 'DESC'));?>
<?php if (isset($myposts8[0])) { ?>
<section><h1>Grabaciones de 701 a 800</h1>
<div class="head-playlist"><ul><li>Nombre</li><li>Marcar como ya escuchada</li></ul></div>
<form action="?page_id=1940" method="post" class="formulario-pesos"><ol>
	<input type="hidden" name="id-usuario" value="<?php echo get_current_user_id( ); ?>"/>
		<?php foreach ( $myposts8 as $post ) : setup_postdata( $post ); ?>
				<li><a href="#" data-src="<?php the_field("audio"); ?>">
					 <?php echo $contadorAudios++ .'. '; the_title(); ?></a>
				</li><aside>
					<?php $idaudios = get_the_ID(); ?><input type="checkbox" name="id-audio[]" value="<?php echo $idaudios; ?>"
					<?php if (in_array($idaudios, $audiosCheckbox )) echo 'checked';?>>
					 </aside>
				<div class="lineadivisoria-audios"></div>
			<?php endforeach; wp_reset_postdata();?>
<input type='hidden' id='myInput' name='previus' value='".$_SERVER['PHP_SELF']."' />
</ol></form>
<input type="submit" value="Guardar >" class="guardarpeso"></section>
<?php } ?>


</div>




<!--<div id="shortcuts"><div><h1>Keyboard shortcuts:</h1>	<p><em>→</em> Next track</p><p><em>←</em> Previous track</p><p><em>Space</em> Play/pause</p></div></div>-->
</div>

<!-- -------------------------- Conferencias go to meeting ------------------------------ -->
<div class="tabContent hide" id="conferencias">
	<header>Sesiones en vivo</header>
	<section>
		<img src="wp-content/themes/plusvida/img/usuarios/gotomeeting-logo.jpg"/>
		<p>Ingresa el siguiente número reunión "533-448-909":</p>
		<center><script src="http://www.citrixonlinecdn.com/dtsimages/im/support/en/meetNowG.js" language="javascript" type="text/javascript"></script></center>
	</section>
</div>

<!-- -------------------------- Recomendaciones del doctor PlusVida ------------------------------ -->
<div class="tabContent hide" id="drpusvida">
	<header>Recomendaciones Dr. PlusVida</header>
<div class="recomendaciones-drpv">

	<!-------- Ejemplo  ---
	<ul><li>1. Recuerda pesarte cada día en el mismo horario!</li>
	<li>2. No olvides tomar los 4 litros de líquido cada día!</li>
	<li>3. Pensar no adelgaza!</li>
	<li>4. No hagas "casi todo" haz Caso a todo!</li></ul>
	<!-------- Ejemplo  --- -->

	<?php $tiporecomendacion = get_field("recomendacionesdrpv");
	$recomendaciones = get_posts(array('showposts' => -1,'post_type' => 'recomendacionesdrpv', 'tax_query' => array(
		array( 'taxonomy' => 'porantiguedad', 'field' => 'slug', 'terms' => $tiporecomendacion )  )));?>
	<ul><?php foreach ( $recomendaciones as $post ) : setup_postdata( $post ); ?><li>
		<?php the_content( ); ?>

	</li> <?php endforeach; wp_reset_postdata();?></ul>
</div>
</div>

<!-- -------------------------- Contacto usuarios ------------------------------ -->
<div class="tabContent hide" id="contacto">
	<header>Contáctanos</header>
	<div class="contactousuarios"><ul>
		<li><h1>911 PlusVida</h1>Atención 24/7 a todas tus consultas y necesidades</br>Llámanos:  <b>+(502) 3092-2286</b></li>
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
        var audiosEscuchados = {};
        $(":checkbox").each(function(){
          audiosEscuchados[this.id] = this.checked;
        });
        $.cookie('audiosEscuchados', audiosEscuchados, { expires: 900 })
      });

      function repopulateCheckboxes(){
        var audiosEscuchados = $.cookie('audiosEscuchados');
        if(audiosEscuchados){
          Object.keys(audiosEscuchados).forEach(function(element) {
            var checked = audiosEscuchados[element];
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
