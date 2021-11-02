<?php 
$serveur= "localhost";
$user= "root";
$password="";
$bd="commande";

$cne = mysqli_connect($serveur, $user, $password, $bd);

if ($cne)
{
	echo "";
	
}
else
{
	die("connection échouée ".mysqli_connect_error());
}

?>