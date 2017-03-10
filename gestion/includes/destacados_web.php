<?php

require 'meta.php';

try{

	$consulta = Meta::Consulta('SELECT * FROM destacados ORDER BY id_destacado DESC');

	if (count($consulta)>0){
		foreach ($consulta as $linea) { ?>

                        <li class="item">
                                <figure>
                                    <img src="img/destacados/<?= $linea['imagen']; ?>" alt="">
                                </figure>

                                <div class="barra">
                                    <h1><?= $linea['descripcion']; ?></h1>
                                    <?php if (floatval($linea['precio'])>0){ ?>
                                        <p class="precio">$ <?= number_format($linea['precio'], 2); ?> USD</p>
                                    <?php } ?>
                                </div>
                        </li>
		<?php }
	}

}catch(Exception $e){
	echo $e->getMessage();
}