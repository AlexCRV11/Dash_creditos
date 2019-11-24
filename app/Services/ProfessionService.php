<?php 
	
	namespace App\Services;
	use App\Profession;

	class ProfessionService
	{
		
		public function get()
		{
			$professions = Profession::get();
			$professionsArray [''] = 'Selecciona una profesion';
			foreach ($professions as $profesion ) {
				$professionsArray[$profesion->id]= $profesion->profesion;
			}
			return $professionsArray;
		}
	}
 ?>