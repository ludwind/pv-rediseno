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

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php
			if ( ! is_user_logged_in() ) { // Display WordPress login form:
					$args = array(
							'redirect' => admin_url(),
							'form_id' => 'loginform-custom',
							'label_username' => __( 'Username custom text' ),
							'label_password' => __( 'Password custom text' ),
							'label_remember' => __( 'Remember Me custom text' ),
							'label_log_in' => __( 'Log In custom text' ),
							'remember' => true
					);
					wp_login_form( $args );
			} else { // If logged in:
					wp_loginout( '?paginas-website=login' ); // Display "Log Out" link.
					echo " | ";
					wp_register('', ''); // Display "Site Admin" link.
			}
			?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>

				<nav class="nav-single">
					<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentytwelve' ); ?></h3>
					<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentytwelve' ) . '</span> %title' ); ?></span>
					<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentytwelve' ) . '</span>' ); ?></span>
				</nav><!-- .nav-single -->

				<?php comments_template( '', true ); ?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
