<?php namespace Pladi\Helpers;

	class Request 
	{

		/*		FUNCTION IS AJAX 		*/
		
		public static function is_ajax() 
		{
		  return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
		}
			
		/*	**	*/

	}

/*		FIN CLASS HELPER REQUEST		*/