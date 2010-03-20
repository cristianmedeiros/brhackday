<?PHP

class productBean extends bean{

	public function __set($atr,$value){
	
		$this->$atr = $value;
	
	}
		
	public function __get($atr){
	
		return $this->$atr;
	
	}

}
