
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site</title>
</head>
<body>
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
    $fam = $_POST['fam']; 
    $imya = $_POST['imya']; 
    $otch = $_POST['otch']; 
    $nomer_sheta = $_POST['nomer_sheta']; 
    $nomer_polisa = $_POST['nomer_polisa'];
    $telefon = $_POST['telefon']; 
    $sql = "INSERT INTO klienti (fam, imya, otch, nomer_sheta, nomer_polisa, telefon) VALUES ('$fam', '$imya', '$otch', '$nomer_sheta', '$nomer_polisa', '$telefon')"; 
    if ($conn->query($sql) === TRUE) 
    { 
        echo "Новая запись создана успешно"; 
    } 
    else {
    echo "Поля формы не были заполнены";
}
$conn->close(); 
?>
<button onclick="goBack()">Вернуться назад</button>

<script>
  function goBack() {
    window.history.back();
  }
</script>
</body>
</html>