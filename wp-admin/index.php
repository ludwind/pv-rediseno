<?php
/**
 * Dashboard Administration Screen
 *
 * @package WordPress
 * @subpackage Administration
 */

/** Load WordPress Bootstrap */
require_once( dirname( __FILE__ ) . '/admin.php' );

/** Load WordPress dashboard API */
require_once(ABSPATH . 'wp-admin/includes/dashboard.php');

wp_dashboard_setup();

wp_enqueue_script( 'dashboard' );
if ( current_user_can( 'edit_theme_options' ) )
	wp_enqueue_script( 'customize-loader' );
if ( current_user_can( 'install_plugins' ) )
	wp_enqueue_script( 'plugin-install' );
if ( current_user_can( 'upload_files' ) )
	wp_enqueue_script( 'media-upload' );
add_thickbox();

if ( wp_is_mobile() )
	wp_enqueue_script( 'jquery-touch-punch' );

$title = __('Dashboard');
$parent_file = 'index.php';

$help = '<p>' . __( 'Welcome to your WordPress Dashboard! This is the screen you will see when you log in to your site, and gives you access to all the site management features of WordPress. You can get help for any screen by clicking the Help tab in the upper corner.' ) . '</p>';

// Not using chaining here, so as to be parseable by PHP4.
$screen = get_current_screen();

$screen->add_help_tab( array(
	'id'      => 'overview',
	'title'   => __( 'Overview' ),
	'content' => $help,
) );

// Help tabs

$help  = '<p>' . __( 'The left-hand navigation menu provides links to all of the WordPress administration screens, with submenu items displayed on hover. You can minimize this menu to a narrow icon strip by clicking on the Collapse Menu arrow at the bottom.' ) . '</p>';
$help .= '<p>' . __( 'Links in the Toolbar at the top of the screen connect your dashboard and the front end of your site, and provide access to your profile and helpful WordPress information.' ) . '</p>';

$screen->add_help_tab( array(
	'id'      => 'help-navigation',
	'title'   => __( 'Navigation' ),
	'content' => $help,
) );

$help  = '<p>' . __( 'You can use the following controls to arrange your Dashboard screen to suit your workflow. This is true on most other administration screens as well.' ) . '</p>';
$help .= '<p>' . __( '<strong>Screen Options</strong> - Use the Screen Options tab to choose which Dashboard boxes to show.' ) . '</p>';
$help .= '<p>' . __( '<strong>Drag and Drop</strong> - To rearrange the boxes, drag and drop by clicking on the title bar of the selected box and releasing when you see a gray dotted-line rectangle appear in the location you want to place the box.' ) . '</p>';
$help .= '<p>' . __( '<strong>Box Controls</strong> - Click the title bar of the box to expand or collapse it. Some boxes added by plugins may have configurable content, and will show a &#8220;Configure&#8221; link in the title bar if you hover over it.' ) . '</p>';

$screen->add_help_tab( array(
	'id'      => 'help-layout',
	'title'   => __( 'Layout' ),
	'content' => $help,
) );

$help  = '<p>' . __( 'The boxes on your Dashboard screen are:' ) . '</p>';
if ( current_user_can( 'edit_posts' ) )
	$help .= '<p>' . __( '<strong>At A Glance</strong> - Displays a summary of the content on your site and identifies which theme and version of WordPress you are using.' ) . '</p>';
	$help .= '<p>' . __( '<strong>Activity</strong> - Shows the upcoming scheduled posts, recently published posts, and the most recent comments on your posts and allows you to moderate them.' ) . '</p>';
if ( is_blog_admin() && current_user_can( 'edit_posts' ) )
	$help .= '<p>' . __( "<strong>Quick Draft</strong> - Allows you to create a new post and save it as a draft. Also displays links to the 5 most recent draft posts you've started." ) . '</p>';
if ( ! is_multisite() && current_user_can( 'install_plugins' ) )
	$help .= '<p>' . __( '<strong>WordPress News</strong> - Latest news from the official WordPress project, the <a href="http://planet.wordpress.org/">WordPress Planet</a>, and popular and recent plugins.' ) . '</p>';
else
	$help .= '<p>' . __( '<strong>WordPress News</strong> - Latest news from the official WordPress project, the <a href="http://planet.wordpress.org/">WordPress Planet</a>.' ) . '</p>';
if ( current_user_can( 'edit_theme_options' ) )
	$help .= '<p>' . __( '<strong>Welcome</strong> - Shows links for some of the most common tasks when setting up a new site.' ) . '</p>';

$screen->add_help_tab( array(
	'id'      => 'help-content',
	'title'   => __( 'Content' ),
	'content' => $help,
) );

unset( $help );

$screen->set_help_sidebar(
	'<p><strong>' . __( 'For more information:' ) . '</strong></p>' .
	'<p>' . __( '<a href="http://codex.wordpress.org/Dashboard_Screen" target="_blank">Documentation on Dashboard</a>' ) . '</p>' .
	'<p>' . __( '<a href="https://wordpress.org/support/" target="_blank">Support Forums</a>' ) . '</p>'
);

include( ABSPATH . 'wp-admin/admin-header.php' );
?>

<div class="wrap">
	<h2>Bienvenido(a), <?php global $current_user; if ( isset($current_user) ) { echo $current_user->display_name;}?></h2>

<head>
 <link rel="stylesheet" type="text/css" href="css/style.css">
</head>


<div class="tutoriales"><center><h3>¡Administrar este sitio web es fácil!</h3></br>Sigue las instrucciones que encontrarás a continuaciónz:</center>

	<section class="ac-container">
		<div>
			<input id="ac-1" name="accordion-1" type="radio" checked />
			<label for="ac-1">¿Cómo crear usuarios?</label>
			<article class="ac-auto">
<iframe width="320" height="215" src="https://www.youtube.com/embed/9aBMWcFRJvA" frameborder="0" allowfullscreen></iframe>
				<p><ol>
<li>Haz clic en la sección “Perfil de usuarios” en el menú izquierdo, y luego en el menú o botón “Añadir nueva”.</li>
<li>Copia y pega el nombre completo del paciente desde tu base de datos personal, dentro del primer campo “Titulo”.</li>
<li>Asigna la categoría de “Recomendación Dr. PlusVida” que aparecerá en la pestaña  bajo el mismo nombre para el usuario.</li>
<li>Haz clic en el botón “Publicar”. </li>
<li>Haz clic en el menú izquierdo “Usuarios” y luego “Añadir nuevo” idealmente en una nueva pestaña, así dejando abierta la pantalla anterior.</li>
<li>Llenamos toda la información básica de nuestro usuario, dejando como perfil “Suscriptor”.</li>
<li>Para guardar o publicar hacemos clic en “Añadir nuevo usuario”.</li>
<li>Una vez creado nuestro usuario, hacemos clic nuevamente en “Editar usuario” lo cual nos llevará a la pantalla previamente vista con algunos agregados, al  bajar hasta la última opción “Redirect to” en el menú expandible seleccionaremos la pantalla que hemos creado con anterioridad bajo el nombre de nuestro paciente, luego hacemos clic en “Actualizar usuario” para guardar nuestros cambios.</li>
<li>Ahora podemos regresar a nuestra pantalla anterior dentro de “Perfil de usuarios” la cual hemos creado bajo el nombre de nuestro paciente,  dentro del menú derecho en la sección de “Visibilidad” lo cambiaremos de Público a “Privada” para proteger la información de nuestro paciente. Hacemos clic en “Actualizar”.</li>
<li>Hemos finalizado la creación de nuestro usuario, puedes hacer pruebas cerrando sesión e ingresando desde el sitio web en la pestaña de usuarios.</li>
				</ol></p>
			</article>
		</div>
		<div>
			<input id="ac-2" name="accordion-1" type="radio" />
			<label for="ac-2">¿Cómo cargar audios?</label>
			<article class="ac-auto">
<iframe width="320" height="215" src="https://www.youtube.com/embed/QjpAjaJaMJ0" frameborder="0" allowfullscreen></iframe>
				<p><ol>
<li>Idealmente podamos grabar nuestros audios en formato mp3, de lo contrario recomiendo descargar las siguientes plataformas para convertir audio: <a href="http://es.download.cnet.com/All2MP3/3001-2140_4-190407.html?spi=ddd053586ca36d49756661fd0295a0be" target="_blank">All2mp3</a> o <a href="http://real.com" target="_blank">Real Player</a> que incluye Real Converter.</li>
<li>Para este caso convertiremos nuestro audio con Real Converter, abrimos nuestra aplicación y arrastramos directamente nuestro audio dentro de la misma. </li>
<li>Seleccionamos dentro de “Convertir a” la categoría “Audio” el formato MP3, luego en la sección “Guardar en” seleccionamos la carpeta en la cual deseamos guardar nuestro audio, y presionamos el botón “Inicio”.</li>
<li>Una vez convertido nuestro audio a MP3, regresamos a nuestro sitio web, hacemos clic en el menú izquierdo “Audios” y luego en el botón “Añadir nueva”.</li>
<li>Colocamos el título de nuestra elección a ser mostrado en nuestro listado de audios.</li>
<li>En la sección “Audio” hacemos clic en “Añadir archivo” para cargar nuestro audio, ahora es tan fácil como arrastrar el audio hacia nuestra ventana y soltarlo, automáticamente comenzará a subir a nuestro servidor.</li>
<li>Una vez cargado, hacemos clic en “Elegir” y podremos verificar que nuestro audio fue cargado exitosamente, y por último hacemos clic en “Publicar”.</li>
<li>Para colocar nuestro audio al final de nuestro listado o en cualquier posición de nuestra elección, vamos a nuestro menú izquierdo en la pestaña “Audios” y luego en el botón “Ordenar Audios”</li>
<li>En el listado general, encontraremos nuestro nuevo audio al inicio, solamente debemos arrastrarlo a la posición deseada, y hacer clic en “Actualizar”.</li>
<li>Hemos terminado exitosamente la carga de nuestro nuevo audio.</li>
				</ol></p>
			</article>
		</div>
		<div>
			<input id="ac-3" name="accordion-1" type="radio" />
			<label for="ac-3">¿Cómo crear recomendaciones Dr. PlusVida?</label>
			<article class="ac-auto">
<iframe width="320" height="215" src="https://www.youtube.com/embed/ylJR9Wd_L9w" frameborder="0" allowfullscreen></iframe>
				<p>You think water moves fast? You should see ice. It moves like it has a mind. Like it knows it killed the world once and got a taste for murder. After the avalanche, it took us a week to climb out. Now, I don't know exactly when we turned on each other, but I know that seven of us survived the slide... and only five made it out. Now we took an oath, that I'm breaking now. We said we'd say it was the snow that killed the other two, but it wasn't. Nature is lethal but it doesn't hold a candle to man. </p>
			</article>
		</div>
		<div>
			<input id="ac-4" name="accordion-1" type="radio" />
			<label for="ac-4">¿Asignar a usuarios recomendaciones Dr. PlusVida?</label>
			<article class="ac-auto">
<iframe width="320" height="215" src="https://www.youtube.com/embed/OPUyz5C6gAg" frameborder="0" allowfullscreen></iframe>
				<p>You see? It's curious. Ted did figure it out - time travel. And when we get back, we gonna tell everyone. How it's possible, how it's done, what the dangers are. But then why fifty years in the future when the spacecraft encounters a black hole does the computer call it an 'unknown entry event'? Why don't they know? If they don't know, that means we never told anyone. And if we never told anyone it means we never made it back. Hence we die down here. Just as a matter of deductive logic. </p>
			</article>
		</div>
		<div>
			<input id="ac-5" name="accordion-1" type="radio" />
			<label for="ac-5">¿Cómo crear páginas estáticas?</label>
			<article class="ac-auto">
<iframe width="320" height="215" src="https://www.youtube.com/embed/IOnDgDwTG1c" frameborder="0" allowfullscreen></iframe>
				<p>You see? It's curious. Ted did figure it out - time travel. And when we get back, we gonna tell everyone. How it's possible, how it's done, what the dangers are. But then why fifty years in the future when the spacecraft encounters a black hole does the computer call it an 'unknown entry event'? Why don't they know? If they don't know, that means we never told anyone. And if we never told anyone it means we never made it back. Hence we die down here. Just as a matter of deductive logic. </p>
			</article>
		</div>
		<div>
			<input id="ac-6" name="accordion-1" type="radio" />
			<label for="ac-6">¿Cómo crear testimonios?</label>
			<article class="ac-auto">
<iframe width="320" height="215" src="https://www.youtube.com/embed/hsakZhUjr6o" frameborder="0" allowfullscreen></iframe>
				<p>You see? It's curious. Ted did figure it out - time travel. And when we get back, we gonna tell everyone. How it's possible, how it's done, what the dangers are. But then why fifty years in the future when the spacecraft encounters a black hole does the computer call it an 'unknown entry event'? Why don't they know? If they don't know, that means we never told anyone. And if we never told anyone it means we never made it back. Hence we die down here. Just as a matter of deductive logic. </p>
			</article>
		</div>
	</section>

</div>



<?php if ( has_action( 'welcome_panel' ) && current_user_can( 'edit_theme_options' ) ) :
	$classes = 'welcome-panel';

	$option = get_user_meta( get_current_user_id(), 'show_welcome_panel', true );
	// 0 = hide, 1 = toggled to show or single site creator, 2 = multisite site owner
	$hide = 0 == $option || ( 2 == $option && wp_get_current_user()->user_email != get_option( 'admin_email' ) );
	if ( $hide )
		$classes .= ' hidden'; ?>

	<div id="welcome-panel" class="<?php echo esc_attr( $classes ); ?>">
		<?php wp_nonce_field( 'welcome-panel-nonce', 'welcomepanelnonce', false ); ?>
		<a class="welcome-panel-close" href="<?php echo esc_url( admin_url( '?welcome=0' ) ); ?>"><?php _e( 'Dismiss' ); ?></a>
		<?php
		/**
		 * Add content to the welcome panel on the admin dashboard.
		 *
		 * To remove the default welcome panel, use remove_action():
		 * <code>remove_action( 'welcome_panel', 'wp_welcome_panel' );</code>
		 *
		 * @since 3.5.0
		 */
		do_action( 'welcome_panel' );
		?>
	</div>
<?php endif; ?>

	<div id="dashboard-widgets-wrap">



	<?php wp_dashboard(); ?>
	</div><!-- dashboard-widgets-wrap -->

</div><!-- wrap -->

<?php
require( ABSPATH . 'wp-admin/admin-footer.php' );
