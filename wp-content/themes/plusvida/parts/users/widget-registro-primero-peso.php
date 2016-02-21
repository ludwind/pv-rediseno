
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

