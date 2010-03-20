<?PHP

class products extends yqlQuery{
	
	private $query;
	private $bean;
	private $term;
	private $arrProduct = array();

	public function __construct($term){
		$this->term = $term;
		$bean = new bean();
	}
	
	private function set($query){
		$this->setQuery($query);
	}
	
	private function get(){
		return $this->fetch();
	}

	public function submarino(){
		$q = "http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20html%20where%20url%3D%22http%3A%2F%2Fwww.submarino.com.br%2Fbusca%3Fq%3D".$this->term."%26dep%3D%2B%26x%3D0%26y%3D0%22%20%20and%20xpath%3D'%2F%2Fdiv%5B%40class%3D%22product%20hslice%22%5D'&format=xml&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys";
		echo $q;
		$this->set($q);
		return $this->get();
	}
	
	public function americanas(){
		$q = "http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20html%20where%20url%3D%22http%3A%2F%2Fwww.americanas.com.br%2Fbusca%2F".$this->term."%22%20%20and%20xpath%3D'%2F%2Fdiv%5B%40class%3D%22hslice%22%5D'%20&format=xml&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys";
		$this->set($q);
		return $this->get();
	}
	
	public function magazineLuiza(){
		$q = "http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20html%20where%20url%3D%22http%3A%2F%2Fmagazineluiza.com.br%2FBusca%2FDefault.aspx%3FsearchTerm%3D".$this->term."%26category%3D%22%20%20and%20xpath%3D'%2F%2Fdiv%5B%40class%3D%22produto_interno%22%5D'&format=xml&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys";
		$this->set($q);
		return $this->get();
	}	
	
	public function saraiva(){
		$q = "http://query.yahooapis.com/v1/public/yql?q=%20select%20*%20from%20html%20where%20url%3D%22http%3A%2F%2Fwww.livrariasaraiva.com.br%2F".$this->term."%2F%22%20%20and%20xpath%3D'%2F%2Ftable%5B%40class%3D%220300_miolo%22%5D'&format=xml&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys";
		$this->set($q);
		return $this->get();		
	}
	
	public function siciliano(){
		$q = "http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20html%20where%20url%3D%22http%3A%2F%2Fwww.siciliano.com.br%2Ffilm_show%2Fhome.htm%22%20%20and%20xpath%3D'%2F%2Fcenter'&format=xml&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys";
		$this->set($q);
		return $this->get();
	}
	
	public function livrariaCultura(){
		$q = "http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20html%20where%20url%20%3D%20%22http%3A%2F%2Fwww.livrariacultura.com.br%2Fscripts%2Fcultura%2Fbusca%2Fbusca.asp%3Fpalavra%3Dcarros%26tipo_pesq%3Dtitulo%26sid%3D01593210012320668289327967%26k5%3D3B5103C2%26uid%3D%26limpa%3D0%26parceiro%3DORXRXR%26x%3D0%26y%3D0%22%20and%20xpath%3D'%2F%2Ftable%5B%40id%3D%22resultados%22%5D'&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys";
		$this->set($q);
		
		$result = $this->get();
		foreach($result->query->results->table->tr->td->table as $k=>$prod){
		var_dump($prod->tr[1]->td[1]);
			$this->arrProduct[$k]['title'] = str_replace("\n","",$prod->tr[1]->td[1]->span->a->strong);
			$this->arrProduct[$k]['link'] = $prod->tr[1]->td[1]->span->a->href;
			$this->arrProduct[$k]['image'] = $prod->tr[1]->td[0]->table->tr[1]->td->a->img->src;
		}	
		return $this->arrProduct;
	}
	public function fnac(){
		$q = "http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20html%20where%20url%3D%20%22http%3A%2F%2Fwww.fnac.com.br%2Fpesquisa%2F-1%2Ffnac.html%3F%3D".$this->term."%22%20and%20xpath%3D'%2F%2Ftable%5B%40class%3D%22listaResultado%22%5D'&format=xml&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys";
		$this->set($q);
		return $this->get();
	}
	
	public function fastShop(){
		$q = "http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20html%20where%20url%3D%20%22http%3A%2F%2Fwww.fastshop.com.br%2Ffind.aspx%3Fsearch%3D".$this->term."%26dept_id%3D0%22%20and%20xpath%3D'%2F%2Fdiv%5B%40class%3D%22box3%20resultados%22%5D'&format=xml&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys";
		$this->set($q);
		return strip_tags($this->get());
	}
	

}