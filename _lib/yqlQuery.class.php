<?PHP

class yqlQuery{
	
	private $query;
	
	public function setQuery($query){
		$this->query = $query;
	}
	
	public function fetch(){
		//cUrl
		// create a new cURL resource
		$ch = curl_init();

		// set URL and other appropriate options
		curl_setopt($ch, CURLOPT_URL, $this->query);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		// grab URL and pass it to the browser
		$output = curl_exec($ch);

		// close cURL resource, and free up system resources
		curl_close($ch);		
		return json_decode($output);
	}
}