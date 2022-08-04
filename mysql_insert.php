<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "gyakorlas";
$szoveg=$_POST["bevitel"];
$idopont = strtotime(date('Y-m-d H:i:s'));

// kapcsolat létrehozása
$conn = mysqli_connect($servername, $username, $password, $dbname);

// kapcsolat ellenõrzése
if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}

// lekérdezés felépítése
$szoveg=htmlentities($szoveg, ENT_QUOTES, "UTF-8");

// lekérdezés végrehajtása
$sql = "INSERT INTO bejegyzesek (idopont,tartalom) VALUES ('".$idopont."','".$szoveg."')";

if (mysqli_query($conn, $sql))
{
    echo "Új bejegyzés létrehozva";
}
else
{
    echo "Hiba: " . $sql . "<br>" . mysqli_error($conn);
}

// kapcsolat lezárása
mysqli_close($conn);
?>
