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

<form action="?page_id=1940" method="post" class="formulario-pesos">
	<?php
	$contadorAudios = 0;
	 $myposts = get_posts(array('showposts' => 100,'post_type' => 'audioconferencias', 'orderby' => 'date',
	'order' => 'DESC'));?>
<?php if (isset($myposts[0])) { ?>
<section><h1>Grabaciones de 1 a 100</h1>
<div class="head-playlist"><ul><li>Nombre</li><li>Marcar como ya escuchada</li></ul></div>
<div class="mainformaudios"><ol>
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
</ol></div></br>
<input type="submit" value="Guardar >" class="guardarpeso"></section>
<?php } ?>


<?php $myposts2 = get_posts(array('showposts' => 100, 'offset' => 100, 'post_type' => 'audioconferencias', 'orderby' => 'date',
	'order' => 'DESC'));?>
	<?php if (isset($myposts2[0])) { ?>
<section><h1>Grabaciones de 101 a 200</h1>
<div class="head-playlist"><ul><li>Nombre</li><li>Marcar como ya escuchada</li></ul></div>
<div class="mainformaudios"><ol>
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
</ol></div></br>
<input type="submit" value="Guardar >" class="guardarpeso"></section>
<?php } ?>

<?php $myposts3 = get_posts(array('showposts' => 100, 'offset' => 200, 'post_type' => 'audioconferencias', 'orderby' => 'date',
	'order' => 'DESC'));?>
	<?php if (isset($myposts3[0])) { ?>
<section><h1>Grabaciones de 201 a 300</h1>
<div class="head-playlist"><ul><li>Nombre</li><li>Marcar como ya escuchada</li></ul></div>
<div class="mainformaudios"><ol>
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
</ol></div></br>
<input type="submit" value="Guardar >" class="guardarpeso"></section>
<?php } ?>


<?php $myposts4 = get_posts(array('showposts' => 100, 'offset' => 300, 'post_type' => 'audioconferencias', 'orderby' => 'date',
	'order' => 'DESC'));?>
	<?php if (isset($myposts4[0])) { ?>
<section><h1>Grabaciones de 301 a 400</h1>
<div class="head-playlist"><ul><li>Nombre</li><li>Marcar como ya escuchada</li></ul></div>
<div class="mainformaudios"><ol>
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
</ol></div></br>
<input type="submit" value="Guardar >" class="guardarpeso"></section>
<?php } ?>


<?php $myposts5 = get_posts(array('showposts' => 100, 'offset' => 400, 'post_type' => 'audioconferencias', 'orderby' => 'date',
	'order' => 'DESC'));?>
	<?php if (isset($myposts5[0])) { ?>
<section><h1>Grabaciones de 401 a 500</h1>
<div class="head-playlist"><ul><li>Nombre</li><li>Marcar como ya escuchada</li></ul></div>
<div class="mainformaudios"><ol>
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
</ol></div></br>
<input type="submit" value="Guardar >" class="guardarpeso"></section>
<?php } ?>


<?php $myposts6 = get_posts(array('showposts' => 100, 'offset' => 500, 'post_type' => 'audioconferencias', 'orderby' => 'date',
	'order' => 'DESC'));?>
	<?php if (isset($myposts6[0])) { ?>
<section><h1>Grabaciones de 501 a 600</h1>
<div class="head-playlist"><ul><li>Nombre</li><li>Marcar como ya escuchada</li></ul></div>
<div class="mainformaudios"><ol>
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
</ol></div></br>
<input type="submit" value="Guardar >" class="guardarpeso"></section>
<?php } ?>


<?php $myposts7 = get_posts(array('showposts' => 100, 'offset' => 600, 'post_type' => 'audioconferencias', 'orderby' => 'date',
	'order' => 'DESC'));?>
	<?php if (isset($myposts7[0])) { ?>
<section><h1>Grabaciones de 601 a 700</h1>
<div class="head-playlist"><ul><li>Nombre</li><li>Marcar como ya escuchada</li></ul></div>
<div class="mainformaudios"><ol>
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
</ol></div></br>
<input type="submit" value="Guardar >" class="guardarpeso"></section>
<?php } ?>



<?php $myposts8 = get_posts(array('showposts' => 100, 'offset' => 700, 'post_type' => 'audioconferencias', 'orderby' => 'date',
	'order' => 'DESC'));?>
<?php if (isset($myposts8[0])) { ?>
<section><h1>Grabaciones de 701 a 800</h1>
<div class="head-playlist"><ul><li>Nombre</li><li>Marcar como ya escuchada</li></ul></div>
<div class="mainformaudios"><ol>
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
</ol></div></br>
<input type="submit" value="Guardar >" class="guardarpeso"></section>
<?php } ?>


<?php $myposts8 = get_posts(array('showposts' => 100, 'offset' => 800, 'post_type' => 'audioconferencias', 'orderby' => 'date',
	'order' => 'DESC'));?>
<?php if (isset($myposts9[0])) { ?>
<section><h1>Grabaciones de 801 a 900</h1>
<div class="head-playlist"><ul><li>Nombre</li><li>Marcar como ya escuchada</li></ul></div>
<div class="mainformaudios"><ol>
	<input type="hidden" name="id-usuario" value="<?php echo get_current_user_id( ); ?>"/>
		<?php foreach ( $myposts9 as $post ) : setup_postdata( $post ); ?>
				<li><a href="#" data-src="<?php the_field("audio"); ?>">
					 <?php echo $contadorAudios++ .'. '; the_title(); ?></a>
				</li><aside>
					<?php $idaudios = get_the_ID(); ?><input type="checkbox" name="id-audio[]" value="<?php echo $idaudios; ?>"
					<?php if (in_array($idaudios, $audiosCheckbox )) echo 'checked';?>>
					 </aside>
				<div class="lineadivisoria-audios"></div>
			<?php endforeach; wp_reset_postdata();?>
</ol></div></br>
<input type="submit" value="Guardar >" class="guardarpeso"></section>
<?php } ?>


<?php $myposts8 = get_posts(array('showposts' => 100, 'offset' => 900, 'post_type' => 'audioconferencias', 'orderby' => 'date',
	'order' => 'DESC'));?>
<?php if (isset($myposts10[0])) { ?>
<section><h1>Grabaciones de 901 a 1000</h1>
<div class="head-playlist"><ul><li>Nombre</li><li>Marcar como ya escuchada</li></ul></div>
<div class="mainformaudios"><ol>
	<input type="hidden" name="id-usuario" value="<?php echo get_current_user_id( ); ?>"/>
		<?php foreach ( $myposts10 as $post ) : setup_postdata( $post ); ?>
				<li><a href="#" data-src="<?php the_field("audio"); ?>">
					 <?php echo $contadorAudios++ .'. '; the_title(); ?></a>
				</li><aside>
					<?php $idaudios = get_the_ID(); ?><input type="checkbox" name="id-audio[]" value="<?php echo $idaudios; ?>"
					<?php if (in_array($idaudios, $audiosCheckbox )) echo 'checked';?>>
					 </aside>
				<div class="lineadivisoria-audios"></div>
			<?php endforeach; wp_reset_postdata();?>
</ol></div></br>
<input type="submit" value="Guardar >" class="guardarpeso"></section>
<?php } ?>


</form>
</div>




<!--<div id="shortcuts"><div><h1>Keyboard shortcuts:</h1>	<p><em>→</em> Next track</p><p><em>←</em> Previous track</p><p><em>Space</em> Play/pause</p></div></div>-->
</div>
