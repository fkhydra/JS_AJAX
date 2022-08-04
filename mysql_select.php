<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "gyakorlas";
$szoveg = "";
$result = false;

// kapcsolat létrehozása
$conn = mysqli_connect($servername, $username, $password, $dbname);

// kapcsolat ellenőrzése
if (!$conn) {die("Connection failed: " . mysqli_connect_error());}

// lekérdezés felépítése
$sql = "SELECT idopont,tartalom FROM bejegyzesek ORDER BY idopont DESC";

// lekérdezés végrehajtása
$result = mysqli_query($conn, $sql);

// kimenet felépítése
if (mysqli_num_rows($result) > 0)
 {
    while($row = mysqli_fetch_assoc($result))
	{
	 echo date('Y.m.d H:i:s',$row["idopont"]);
	 echo "<br>";
	 $szoveg=$row["tartalom"];
	 $szoveg=html_entity_decode($szoveg, ENT_QUOTES, "UTF-8");
	 echo $szoveg;
         	 echo "<br><br>";
	}
}
else
{
    $szoveg="Az adattábla még üres!";
    echo $szoveg;
}

// kapcsolat lezárása
mysqli_close($conn);
?>
