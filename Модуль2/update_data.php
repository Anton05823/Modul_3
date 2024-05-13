<?php 
$servername = "localhost";  
$username = "root"; 
$password = "";  
$dbname = "pm030509";  

$conn = new mysqli($servername, $username, $password, $dbname);  
if ($conn->connect_error)  
{  
    die("Connection failed: " . $conn->connect_error);  
}  

    $id = $_POST['id']; 
    $fam = $_POST['fam']; 
    $imya = $_POST['imya']; 
    $otch = $_POST['otch']; 
    $nomer_sheta = $_POST['nomer_sheta']; 
    $nomer_polisa = $_POST['nomer_polisa']; 
    $telefon = $_POST['telefon']; 

    $sql = "UPDATE klienti SET fam='$fam', imya='$imya', otch='$otch', nomer_sheta='$nomer_sheta', nomer_polisa='$nomer_polisa', telefon='$telefon' WHERE 	id_klienta ='$id'"; 
    if ($conn->query($sql) === TRUE) {  
        echo "Данные обновлены"; 
        header('Location: main.php'); 
    } else {  
        echo "Ошибка при обновление данных: " . $conn->error;  
    } 

$conn->close();  
?> 