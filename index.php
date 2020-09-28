<?php
// bu otomatik olarak tüm dosyaları dahil edecektir.
spl_autoload_register(function ($className)
{
	$dosyayolu=__DIR__.'/libs/'.$className.'.php';	
	@include($dosyayolu);
});

require 'config/genel.php';
require 'config/database.php';
require 'helper/AdminExternal.php';
require 'helper/ExternalFunctions.php';
require 'config/Route.php';

//$Route= new Route;
$Route= new Route;
		
	
	


?>