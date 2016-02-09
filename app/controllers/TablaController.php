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
	
	public function Excelcarini()
	{	
		Excel::create('Contactos',function($excel)
		{
			$excel->sheet('CrH',function($sheet)
			{
				$data = array();
				$results = DB::table('formulario')
				->get();
				foreach ($results as $result) {
				$data[] = (array)$result;
				}  	
				$sheet->with($data);
				$sheet->freezeFirstRow();
				$sheet->setAutoFilter();
				$sheet->cells('A1:R1', function($cells) {
			    	$cells->setBackground('#dadae3');
				});
			})->download('xlsx');
		});
    }	

}
?>