<?php
@ob_start();
	@session_start();
	date_default_timezone_set('Europe/Istanbul');
if (isset($_GET["vtb"])) {
	$_SESSION["veritabani"] 	= "";
	$_SESSION["veritabani"] 	= $_GET["vtb"];
	header("Location:index.php");
}
if (!isset($_SESSION["veritabani"])) {

$user = 'root';
$pass = '';
$server = 'localhost';

$dbh = new PDO( "mysql:host=$server", $user, $pass );
$dbs = $dbh->query( 'SHOW DATABASES' );

while( ( $db = $dbs->fetchColumn( 0 ) ) !== false )
{
     $_SESSION["veritabani"] = $db;
}

}

	
	$db_user 	= "root";        // Kullanıcı adı
	$db_pass 	= "";            // Veritabanı şifre
	$db_name 	= $_SESSION["veritabani"]; // Veritabanı Adı
	$host_name 	= "localhost";

	
	try {
	    $db  	= new PDO("mysql:host=$host_name;dbname=$db_name", $db_user, $db_pass);
	} catch (PDOException $e) {
	    echo 'Connection failed: '.$e->getMessage();
	}

	$db->query("SET NAMES utf8");
	$db->query("SET CHARACTER SET utf8");
	$db->query("SET COLLATION_CONNECTION = 'utf8_general_ci'");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  
?>
