
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
	
	