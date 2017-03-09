<?php

require 'meta.php';

try{

	$consulta = Meta::Consulta('SELECT * FROM destacados');

	if (count($consulta)>0){
		foreach ($consulta as $linea) { ?>
			<li class="item">
        		<div class="cabeza">        			
        			<h2><?= $linea['descripcion']; ?></h2>
        		</div>        		
        		<figure><img src="../img/destacados/<?= $linea['imagen']; ?>" alt="<?= $linea['descripcion']; ?>"></figure>
        		<ul class="opciones">
        			<?php if ($linea['estado']==0){ ?>
						<li><a href="#" onclick="Mostrar(<?= $linea['id_destacado']; ?>); return false;" class="icon-visibility"></a></li>
        			<?php }else{ ?>
						<li><a href="#" onclick="Mostrar(<?= $linea['id_destacado']; ?>); return false;" class="icon-visibility_off"></a></li>
        			<?php } ?>
        			<li><a href="#" onclick="Editar(<?= $linea['id_destacado']; ?>); return false;" class="icon-mode_edit"></a></li>
        			<li><a href="#" onclick="Eliminar(<?= $linea['id_destacado']; ?>); return false;" class="icon-delete"></a></li>
        		</ul>
        	</li>
		<?php }
	}

}catch(Exception $e){
	echo $e->getMessage();
}