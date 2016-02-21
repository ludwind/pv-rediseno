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