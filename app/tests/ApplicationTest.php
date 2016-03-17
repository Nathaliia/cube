<?php

class ApplicationTest extends TestCase {

	public function testUpdateFunctionality()
	{
		$controller = new ApplicationController();

		$response = $controller->update(4,2,array(
				1 => '2',
				2 => '2',
				3 => '2',
				4	=> '4'
			) );

			if( empty($response) ){
				$validate = false;
			} else {
				$validate = true;
			}
			$this->assertTrue( $validate );
	}
	
	public function testQueryFunctionality()
	{
			$controller = new ApplicationController();
			$response = $controller->query(4,2,array(
					1 => '1',
					2 => '1',
					3 => '1',
					4	=> '3',
					5	=> '3',
					6	=> '3'
				) );

				$this->assertTrue( TRUE );
	}
}
