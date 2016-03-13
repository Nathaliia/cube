<?php

class CubeController extends \BaseController {

	/**
	 * Show the form for creating a new cube.
	 *
	 */
	public function getIndex()
	{
		//Cargamos el formulario
		return View::make('cube.form');
	}

}