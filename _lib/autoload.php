<?PHP
	session_start();
	function __autoload($func){
	
		if(strtolower($func) == 'smarty'){
			
			require("_lib/smarty/Smarty.class.php");
			
		}else{
		
			require("_lib/$func.class.php");
			
		}
	
	}


?>