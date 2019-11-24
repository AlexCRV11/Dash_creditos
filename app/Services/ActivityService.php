<?php 
	
	namespace App\Services;
	use App\Acom;
	Use App\Departament;
	class ActivityService
	{
		
		public function get()
		{
			$acoms = Acom::get();
			$acomsArray [''] = 'Selecciona un ACOM';
			foreach ($acoms as $acom ) {
				$acomsArray[$acom->id]= $acom->nombre;
			}
			return $acomsArray;
		}

		public function getbyDep($id)
		{
			$departament=Departament::where('personal_id',$personal->departament->id)->first();
			$acoms=$departament->acoms()->get();
			$acomsArray [''] = 'Selecciona un ACOM';
			$acomsArray [''] = 'Selecciona un ACOM';
			foreach ($acoms as $acom ) {
				$acomsArray[$acom->id]= $acom->nombre;
			}
			return $acomsArray;
		}
	}
 ?>