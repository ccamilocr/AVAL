<?php

class FormularioController extends BaseController {
	public function postCargaInfo()
	{
		/*
		DB::table('Formulario')->insert(
		    	array(
		    		'nombre' => Input::get('nombre'), 
		    		'cedula' => Input::get('cedula'),
		    		'correo' => Input::get('correo'),
		    		'telfijo' => Input::get('telfijo'),
		    		'celular' => Input::get('celular'),
		    		'departamento' => Input::get('selectdepto'),
		    		'municipio' => Input::get('selectmpio'),
		    		'ingresos' => Input::get('ingresos'),
		    		'prestamo' => Input::get('prestamo'),
		    		
		    		'habeasdata' => Input::get('habeas'),
		    		'llamar' => Input::get('llamada')
		    	)
			);
		*/
		$idmaximo =  DB::table('Formulario')->max('id_formulario');

		$formulario = new Formulario;
	    $formulario->nombre =  Input::get('nombre');
	    $formulario->cedula =  Input::get('cedula');
	    $formulario->correo =  Input::get('correo');
	    $formulario->telfijo =  Input::get('telfijo');
	    $formulario->celular =  Input::get('celular');
	    $formulario->departamento =  Input::get('selectdepto');
	    $formulario->municipio =  Input::get('selectmpio');
	    $formulario->ingresos =  Input::get('ingresos');
	    $formulario->prestamo =  Input::get('prestamo');
	    $formulario->habeasdata =  Input::get('habeas');
	    $formulario->llamar =  Input::get('llamada');
		// guardamos
		$formulario->save();

		$banco=Input::get('banco');
		
		for ($i=0; $i < count($banco) ; $i++) { 
    		DB::table('fromubanco')->insert(
		    	array(
		    		'id_formulario' => $idmaximo+1,
		    		'id_banco' => $banco[$i]		    		
		    	)
			);
    	}
		
		return Redirect::to('/')->with('status', 'ok_estatus');
	}
	   		

}
?>
