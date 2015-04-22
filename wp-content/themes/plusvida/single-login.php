<?php
/**
* The Template for displaying all single posts
*
* @package WordPress
* @subpackage Twenty_Twelve
* @since Twenty Twelve 1.0
*
* WP Post Template: Login
*/

get_header(); ?>


<div class="loginpv">

<section>
	<h1>¿eres usuario?</h1>


				<?php
				if ( ! is_user_logged_in() ) { // Display WordPress login form:
						$args = array(
								'redirect' => admin_url(),
								'form_id' => 'loginform-custom',
								'label_username' => __( 'Usuario' ),
								'label_password' => __( 'Contraseña' ),
								'label_remember' => __( 'Recuerdame' ),
								'label_log_in' => __( 'Ingresar >' ),
								'remember' => true
						);
						wp_login_form( $args );
				} else { // If logged in:
						wp_loginout( '?paginas-website=login' ); // Display "Log Out" link.
						echo " | ";
						wp_register('', ''); // Display "Site Admin" link.
				}
				?>

</section>

<aside>
<h1>¿no eres usuario?</h1>
No esperes más para empezar tu cambio de vida
<a href="?paginas-website=contacto">empieza ahora ></a>
</aside>

</div>


<div class="contenidofront">
<ul class="login-img-banner">
	<li><img src="wp-content/themes/plusvida/img/login/login-img1.jpg"/></li>
	<li><img src="wp-content/themes/plusvida/img/login/login-img2.jpg"/></li>
	<li><img src="wp-content/themes/plusvida/img/login/login-img3.jpg"/></li>
	<li><img src="wp-content/themes/plusvida/img/login/login-img4.jpg"/></li>
</ul>
</div>


<div class="login-blackout"></div>


<?php get_footer(); ?>
