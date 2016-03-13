<?php

class CubeController extends \BaseController {

	/**
	 * Show the form for creating a new cube.
	 * @return View
	 */
	public function getIndex()
	{
		//Cargamos el formulario
		return View::make('cube.form');
	}

	/**
	 * Receive the data for creating a new cube.
	 * @params Input
	 * @return View
	 */
	public function postStore()
	{
		$data = Input::all();

		$variables = explode(PHP_EOL,$data["text_data"]);
		$t = $variables[0];
		unset( $variables[0] );

		//TEST CASES
		$test_actual = 1;
		if($t >= 1 && $t <= 50 ){

			for ($i=1; $i <= intval($t); $i++) {
				$resultados[$i] = array();
				$this->errores[$i] = array();
				$this->actualizados = array();

				if( !empty($variables[$test_actual]) ){
					$configuracion = explode(" ",$variables[$test_actual]);
					if( count($configuracion) == 2){
						$n = $configuracion[0];
						$m = $configuracion[1];
						if( ($n >=1 && $n <= 100) && ($m >=1 && $m <= 1000) ){
							//INICIALIZAMOS EL CUBO
							$cube = array( array( array() ) );

							//OPERACIONES
							for ($j= 1; $j <= $m; $j++) {
								$operaciones = explode(" ",$variables[$test_actual+$j]);
								if( count($operaciones) > 2 ){
									if( count($operaciones) == 7 ){
										$operacion = 2;
									} elseif( count($operaciones) == 5 ) {
										$operacion = 1;
									} else {
										$this->errores[$i][] = "Las lineas de las operaciones superan la cantidad de parametros permitidos.";
									}

									if( empty($this->errores[$i]) ){
										if( $operacion == 1 ){
											$cube = $this->update( $n,$i,$operaciones,$cube );
										} elseif( $operacion == 2 ){
											$resultados[$i][] = $this->query( $n,$i,$operaciones,$cube );
										}
									}
								} else {
									$this->errores[$i][] = "Esto no es una operacion.";
									$test_actual = $test_actual-1;
								}
							}
							$test_actual = $test_actual + $m + 1;
						} else {
							$test_actual = $test_actual + 1;
							$this->errores[$i][] = "los valores de N o M no son validos.";
						}
					} else {
						$i = $i-1;
						$test_actual = $test_actual + 1;
						if( empty($this->errores[$i]) ){
							$this->errores[$i][] = "Linea	 Invalida";
						}
					}
				} else {
					$this->errores[$i][] = "Espacio invalido";
				}
			}
		}
		
		//VISTA
		echo "<pre>";
		var_dump($this->errores);
		var_dump($resultados);
	}
}