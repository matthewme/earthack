<?php
try
{
	$dbh = new PDO( 'mysql:host=localhost;dbname=3342recipes',
					'3342user', 'temp1234',
					array( PDO::ATTR_PERSISTENT => true ) );
					
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch( PDOEXCEPTION $e ) 
{
	print "ERROR: ".$e->getMessage();
}
?>