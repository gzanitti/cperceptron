<?php
include_once 'cmatrix.php';

class cperceptron extends cmatrix
{
	//cperceptron	
	//Una red neuronal (perceptron simple) implementada en PHP.
	//A neural network (Simple Perceptron) implemented in PHP.
	
	//Gaston Zanitti <gzanitti@gmail.com>
	
	//LICENCIA: cperceptron es liberado bajo la licencia MIT.
	//LICENSE: cperceptron is released under the MIT License.
	
	public function trainPS($trainIn, $trainOut, $error, $iter, $vel)
	{
		//$trainIn: Array con valores de entrenamiento.
		//$trainOut: Array con valores de respuesta.
		//$error: Cota de error.
		//$iter: Cota de iteraciones.
		//$vel: Velocidad de aprendizaje.
		
		$wc = new cmatrix();
		$n = sizeof($trainIn[0]);
		$m = sizeof($trainOut[0]);
				
		//Matriz de M columnas y N filas.
		$w = $wc->weightMatrix($n, $m);
		
		$e = 5000;
		$i = 0;
		
		while (($e > $error) && ($i < $iter))
		{
			for ($cant=0; $cant < sizeof($trainIn); $cant++)
			{
				$trainInTmp = $wc->matrix2Vector($trainIn, $cant);
				$trainOutTmp = $wc->matrix2Vector($trainOut, $cant);
				
				//Producto de vector de entrada n con matriz nxm ; Salida: Vector de dimensión M.
				$h = $wc->prodMatrix($trainInTmp, $w);
								
				//Aplico la tangente hiperbolica al resultado anterior. Salida: Misma dimensión.
				$o = $wc->tanhMatrix($h);
								
				//Resto la salida esperada con el valor obtenido 1 a 1. Salida: Misma dimensión.
				$delta = $wc->minusMatrix($trainOutTmp, $o);
								
				//Aplico la derivada de la tangente hiperbolica a la primera multiplicación. Salida: Vector de dimensión M.
				$derTanH = $wc->minusConsMatrix(1, $o);
								
				//Multiplico la resta anterior (dimensión 1xM) con el resultado de aplicar la derivada (dimensión 1xM); Salida: Vector de dimensión M.
				$prod = $wc->prodVector($delta[0], $derTanH[0]);
				
				//Transpongo la entrada correspondiente. Salida: Nx1
				$transTrainIn = $wc->transMatrix($trainInTmp);

				//Multiplico la entrada transpuesta (nx1) por el producto obtenido (1xM).
				$deltaW = $wc->prodMatrix($transTrainIn, $prod);
				
				//Multiplico la variacion de pesos por la constante de velocidad.
				$deltaW = $wc->prodConsMatrix($vel, $deltaW);
				
				//Sumo la variacion obtenida a la antigua matriz de pesos.
				$w = $wc->plusMatrix($w, $deltaW);
				
			}
			
			$e = $wc->minusMatrix($trainOutTmp, $o);
			$e = $wc->norm2Matrix($e);
			$e = $wc->sumMatrix($e);
			$e = 1/2 * $e;
			
			$i++;			
		}		
		return $w;
	}
}

?>
