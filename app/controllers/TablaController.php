<?php

class TablaController extends BaseController {
	
	public function __construct()
	{
		$this->beforeFilter('auth');  //bloqueo de acceso
	}
	public function Datos()
	{    
		
		$datosforms = DB::select("SELECT id_formulario, nombre, cedula, correo, telfijo, celular, departamento, municipio, ingresos, prestamo, (CASE WHEN A = 0 THEN 'NO' ELSE 'SI' END ) as BancoBogota, (CASE WHEN B = 0 THEN 'NO' ELSE 'SI' END ) as BancoOccidente, (CASE WHEN C = 0 THEN 'NO' ELSE 'SI' END ) as BancoPopular, (CASE WHEN D = 0 THEN 'NO' ELSE 'SI' END ) as BancoAVVillas, habeasdata, llamar, created_at FROM(SELECT id_formulario, nombre, cedula, correo, telfijo, celular, departamento, municipio, ingresos, prestamo, Sum(CASE WHEN formulariob.id_banco = 1 THEN formulariob.id_banco ELSE 0 END ) as A, Sum(CASE WHEN formulariob.id_banco = 2 THEN formulariob.id_banco ELSE 0 END ) as B, Sum(CASE WHEN formulariob.id_banco = 3 THEN formulariob.id_banco ELSE 0 END ) as C, Sum(CASE WHEN formulariob.id_banco = 4 THEN formulariob.id_banco ELSE 0 END ) as D, (CASE WHEN habeasdata = 1 THEN 'SI' ELSE 'NO' END) habeasdata, (CASE WHEN llamar = 1 THEN 'SI' ELSE 'NO' END) llamar, created_at FROM(SELECT formularioa.id_formulario, formularioa.nombre, formularioa.cedula, formularioa.correo, formularioa.telfijo, formularioa.celular, formularioa.departamento, formularioa.municipio, formularioa.ingresos, formularioa.prestamo, fromubanco.id_banco, formularioa.habeasdata, formularioa.llamar, formularioa.created_at FROM(SELECT formulario.id_formulario, formulario.nombre, formulario.cedula, formulario.correo, formulario.telfijo, formulario.celular, municipios.DEPTO as departamento, municipios.MUNICIPIO as municipio, formulario.ingresos, formulario.prestamo, formulario.habeasdata, formulario.llamar, formulario.created_at FROM formulario INNER JOIN municipios ON formulario.municipio = municipios.CODANE) as formularioa INNER JOIN fromubanco ON formularioa.id_formulario = fromubanco.id_formulario) as formulariob group by formulariob.id_formulario) as formulariofinal");
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
				$results = DB::select("SELECT id_formulario, nombre, cedula, correo, telfijo, celular, departamento, municipio, ingresos, prestamo, (CASE WHEN A = 0 THEN 'NO' ELSE 'SI' END ) 'Banco de Bogotá', (CASE WHEN B = 0 THEN 'NO' ELSE 'SI' END ) 'Banco de Occidente', (CASE WHEN C = 0 THEN 'NO' ELSE 'SI' END ) 'Banco Popular', (CASE WHEN D = 0 THEN 'NO' ELSE 'SI' END ) 'Banco AV Villas', habeasdata, llamar, created_at FROM(SELECT id_formulario, nombre, cedula, correo, telfijo, celular, departamento, municipio, ingresos, prestamo, Sum(CASE WHEN formulariob.id_banco = 1 THEN formulariob.id_banco ELSE 0 END ) as A, Sum(CASE WHEN formulariob.id_banco = 2 THEN formulariob.id_banco ELSE 0 END ) as B, Sum(CASE WHEN formulariob.id_banco = 3 THEN formulariob.id_banco ELSE 0 END ) as C, Sum(CASE WHEN formulariob.id_banco = 4 THEN formulariob.id_banco ELSE 0 END ) as D, (CASE WHEN habeasdata = 1 THEN 'SI' ELSE 'NO' END) habeasdata, (CASE WHEN llamar = 1 THEN 'SI' ELSE 'NO' END) llamar, created_at FROM(SELECT formularioa.id_formulario, formularioa.nombre, formularioa.cedula, formularioa.correo, formularioa.telfijo, formularioa.celular, formularioa.departamento, formularioa.municipio, formularioa.ingresos, formularioa.prestamo, fromubanco.id_banco, formularioa.habeasdata, formularioa.llamar, formularioa.created_at FROM(SELECT formulario.id_formulario, formulario.nombre, formulario.cedula, formulario.correo, formulario.telfijo, formulario.celular, municipios.DEPTO as departamento, municipios.MUNICIPIO as municipio, formulario.ingresos, formulario.prestamo, formulario.habeasdata, formulario.llamar, formulario.created_at FROM formulario INNER JOIN municipios ON formulario.municipio = municipios.CODANE) as formularioa INNER JOIN fromubanco ON formularioa.id_formulario = fromubanco.id_formulario) as formulariob group by formulariob.id_formulario) as formulariofinal");
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