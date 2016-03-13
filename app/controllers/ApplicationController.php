<?php

class ApplicationController extends BaseController {

	public $errores = array();
	public $actualizados = array();

	/**
	 * Update position the cube.
	 *
	 * @param  int  $n,int $t, array $operaciones, array $cube
	 * @return Array
	 */
	public function Update( $n,$t,$operaciones, $cube )
	{
		$x = $operaciones[1];
		$y = $operaciones[2];
		$z = $operaciones[3];
		$w = $operaciones[4];

		if($x >=1 && $x <= $n){
			if($y >=1 && $y <= $n){
				if($z >=1 && $z <= $n){
					if($w >=-1000000000 && $w <= 1000000000){
						$cube[$x][$y][$z] = $w;
						$this->actualizados[$x.",".$y.",".$z] = $w;
					} else {
						$this->errores[$t][] = "El valor de w no corresponde.";
					}
				} else {
					$this->errores[$t][] = "El valor de z no corresponde.";
				}
			} else {
				$this->errores[$t][] = "El valor de y no corresponde.";
			}
		} else {
			$this->errores[$t][] = "El valor de x no corresponde.";
		}

		return $cube;
	}

	/**
	 * Query and add the values of a range the cube.
	 *
	 * @param  int  $n, int $t, array $operaciones, array $cube
	 * @return Array
	 */
	public function Query( $n,$t,$operaciones,$cube )
	{
		$x1 = $operaciones[1];
		$y1 = $operaciones[2];
		$z1 = $operaciones[3];
		$x2 = $operaciones[4];
		$y2 = $operaciones[5];
		$z2 = $operaciones[6];
		$suma = 0;

		if( $x1 >= 1 && $x1 <= $x2 && $x2 <= $n ){
			if( $x1 >= 1 && $x1 <= $x2 && $x2 <= $n ){
				if( $z1 >= 1 && $z1 <= $z2 && $z2 <= $n ){
					foreach ($this->actualizados as $key => $value) {
						$coordenadas = explode(",",$key);
						if( ($coordenadas[0] >= $x1  && $coordenadas[0] <= $x2) && ($coordenadas[1] >= $y1  && $coordenadas[1] <= $y2) && ($coordenadas[2] >= $z1  && $coordenadas[2] <= $z2) ){
							$suma += $value;
						}
					}
				} else {
					$this->errores[$t][] = "Los valores de Z1 y Z2 no corresponden.";
				}
			} else {
				$this->errores[$t][] = "Los valores de Y1 y Y2 no corresponden.";
			}
		} else {
			$this->errores[$t][] = "Los valores de X1 y X2 no corresponden.";
		}

		return $suma;
	}
}
