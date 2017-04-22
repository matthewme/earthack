<?php
try
{
	$dbh = new PDO( 'mysql:host=localhost;dbname=earthackdb',
					'testguy', 'test123',
					array( PDO::ATTR_PERSISTENT => true ) );
					
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch( PDOEXCEPTION $e ) 
{
	print "ERROR: ".$e->getMessage();
}
?>