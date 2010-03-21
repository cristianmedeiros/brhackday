<?PHP

	include("_lib/autoload.php");

	$produto = new products(urlencode(str_replace(" ","+",$_REQUEST['search'])));
	//$produto->submarino();
	$prod = $produto->americanas();
	print_r($prod);
	//$produto->magazineLuiza();
	//$produto->saraiva();
	//$prod = $produto->livrariaCultura();
	//$produto->fnac();
	//$produto->fastShop();
	
	