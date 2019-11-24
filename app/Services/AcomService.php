<?php 
	
	namespace App\Services;
	use App\Departament;

	class AcomService
	{
		
		public function get()
		{
			$departaments = Departament::get();
			$professionsArray [''] = 'Selecciona un departamento';
			foreach ($departaments as $departament ) {
				$professionsArray[$departament->id]= $departament->departamento;
			}
			return $professionsArray;
		}
	}
 ?>