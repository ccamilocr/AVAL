<?php

class TablaController extends BaseController {
	
	public function __construct()
	{
		$this->beforeFilter('auth');  //bloqueo de acceso
	}
	public function Datos()
	{    
		
		$datosforms = DB::table('formulario')
		->get();
		$bancos = DB::table('fromubanco')
		->get();
		$datosarray = array($datosforms, $bancos);
		return  View::make('tabla', array('datosarray' => $datosarray));
	}
	   		

}
?>