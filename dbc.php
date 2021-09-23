<?php
//database connection
try {
$dbc = new PDO('mysql:host=localhost; dbname=demo', 'root', '');
$dbc->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
} catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}
