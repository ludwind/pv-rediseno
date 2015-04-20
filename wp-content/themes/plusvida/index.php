<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

<div class="sliderarea">
<section><a href="?paginas-website=contacto"><?php if ( function_exists( 'soliloquy' ) ) { soliloquy( '25' ); }
if ( function_exists( 'soliloquy' ) ) { soliloquy( 'slider-homepage', 'slug' ); } ?></a></section>

<aside><ul>
	<li>
		<h1>¡Contáctanos ahora!</h1>
La mejora manera de encontrar la vida saludable que buscas. Contáctanos y recibirás la mejor asesoría y atención personalizada.
<a href="?paginas-website=contacto">Contacto ></a>
	</li>

	<li>
		<h1>¿Necesitas ayuda?</h1>
Si aún tienes dudas o preguntas, contáctanos para poder asesorarte.
<a href="?paginas-website=contacto">Contacto ></a>
	</li>
</ul></aside>
</div>

<div class="bienvenidoinicio"><ul>
<li>
	<h1>¡Bienvenido!</h1>
	<div class="espaciador"></div>
<span>Si buscas un sistema efectivo y real para mejorar tu estilo de vida, estas en
el lugar indicado ¡no busques más!</span>
PlusVida es más que un método de adelgazamiento. Es LA forma de cambiar y mejorar tu estilo de vida.
 No sólo te ayudaremos a bajar peso y reducir medidas. También recibirás las herramientas necesarias
 para alcanzar una mayor calidad de vida!
<a href="?paginas-website=contacto">empezar ahora ></a>
</li>

<li>
	<img src="wp-content/themes/plusvida/img/home/check.png"/><h1>Beneficios</h1>
	<div class="espaciador"></div>
<ul>
	<li>Descenderás rápido de peso hasta llegar al peso saludable</li>
	<li>Reducirás drásticamente tus tallas</li>
	<li>Aprenderás la medida adecuada de alimentos a ingerir de por vida</li>
	<li>Identificarás las "alarmas" para evitar el efecto rebote</li>
	<li>Sin medicamentos, cirugías ni técnicas "milagrosas"</li>
	<li>Tu oportunidad de cambiar y mejorar tu calidad de vida para siempre</li>
</ul>
<a href="?paginas-website=contacto">contáctanos ></a>
</li>

<li>
	<img src="wp-content/themes/plusvida/img/home/testimonios.png"/><h1>Testimonios</h1>
	<div class="espaciador"></div>
<span>Ellos ya cambiaron sus vidas. Tu también puedes hacerlo! Ingresa para leer las experiencias
de nuestros pacientes:</span>
<ul>
	<?php
	query_posts('cat=0$posts_per_page=-1'); // query to show all posts independant from what is in the center;
	if (have_posts()) :
	   while (have_posts()) :
	      the_post(); ?>
	<li>
	      <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
	</li>
	<?php  endwhile;
	endif;
	wp_reset_query();
	?></ul>
<a href="?paginas-website=contacto">contáctanos ></a>
</li>
</ul></div>




<?php get_footer(); ?>
