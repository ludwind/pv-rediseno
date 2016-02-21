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