<?php 
	
	namespace App\Services;
	
	use App\Career;
	use App\Period;

	class StudentService
	{
		
		public function getCarrera()
		{
			$careers = Career::get();
			$careerArray [''] = 'Selecciona una carrera';
			foreach ($careers as $career ) {
				$careerArray[$career->id]= $career->nombre;
			}


			return $careerArray;
		}

		public function getPeriodo()
		{
			$periods = Period::get();
			$periodsArray [''] = 'Selecciona un periodo';
			foreach ($periods as $period ) {
				$periodsArray[$period->id]= $period->nombre." ".$period->año;
			}
			return $periodsArray;
		}
	}
 ?>