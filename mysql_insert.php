<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "gyakorlas";
$szoveg=$_POST["bevitel"];
$idopont = strtotime(date('Y-m-d H:i:s'));

// kapcsolat l�trehoz�sa
$conn = mysqli_connect($servername, $username, $password, $dbname);

// kapcsolat ellen�rz�se
if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}

// lek�rdez�s fel�p�t�se
$szoveg=htmlentities($szoveg, ENT_QUOTES, "UTF-8");

// lek�rdez�s v�grehajt�sa
$sql = "INSERT INTO bejegyzesek (idopont,tartalom) VALUES ('".$idopont."','".$szoveg."')";

if (mysqli_query($conn, $sql))
{
    echo "�j bejegyz�s l�trehozva";
}
else
{
    echo "Hiba: " . $sql . "<br>" . mysqli_error($conn);
}

// kapcsolat lez�r�sa
mysqli_close($conn);
?>
