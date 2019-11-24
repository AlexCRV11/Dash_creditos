<?php 
	
	namespace App\Services;

	class PeriodService
	{
		
		public function get()
		{
			$professionsArray [''] = 'Selecciona un periodo';
			
			$professionsArray['1']= 'Enero - Junio';
			$professionsArray['2']= 'Agosto - Diciembre';


			return $professionsArray;
		}
	}
 ?>