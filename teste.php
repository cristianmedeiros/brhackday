<?PHP

	include("_lib/autoload.php");
	echo $_REQUEST['search'];
	$produto = new products(urlencode(str_replace(" ","+",$_REQUEST['search'])));
	$produto->submarino();
	$produto->americanas();
	$produto->magazineLuiza();
	$produto->saraiva();
	$produto->livrariaCultura();
	$produto->fnac();
	$produto->fastShop();
	
	