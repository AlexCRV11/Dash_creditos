<?php 
	
	namespace App\Services;
	use App\Personal;
	use App\Departament;
	use App\Acom;
	
	class DepartamentService
	{
		
		public function getCargo()
		{
			$cargosArray [''] = 'Selecciona un opción';	
			$cargosArray['1']= 'Jefe';
			$cargosArray['2']= 'Encargado';


			return $cargosArray;
		}

		public function getPersonal()
		{
			$personals = Personal::get();
			$personalsArray [''] = 'Selecciona un personal';
			foreach ($personals as $personal ) {
				$personalsArray[$personal->id]= $personal->RFC."| ".$personal->nombre." ".$personal->paterno." ".$personal->materno;
			}
			return $personalsArray;
		}

		public function getdepartament()
		{
			$departaments = Departament::get();
			$professionsArray [''] = 'Selecciona un departamento';
			foreach ($departaments as $departament ) {
				$professionsArray[$departament->id]= $departament->departamento;
			}
			return $professionsArray;
		}

		public function getacom()
		{
			$acoms = Acom::get();
			$acomsArray [''] = 'Selecciona un ACOM';
			foreach ($acoms as $acom ) {
				$acomsArray[$acom->id]= $acom->nombre;
			}
			return $acomsArray;
		}

	}
 ?>