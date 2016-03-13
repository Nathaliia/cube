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

}
