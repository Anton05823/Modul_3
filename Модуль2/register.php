
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

if ($conn->connect_error) {
    die("Ошибка при подключении: " . $conn->connect_error);
}

$fam = $_POST['fam']; 
$imya = $_POST['imya']; 
$otch = $_POST['otch']; 
$login = $_POST['login']; 
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT * FROM sotrudniki WHERE login=?");
$stmt->bind_param("s", $login);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  echo "Такой логин уже занят";
} else {
    $sql = "INSERT INTO sotrudniki (fam, imya, otch, login, password) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $fam, $imya, $otch, $login, $password);

    if ($stmt->execute()) {
        echo "Регистрация прошла успешно";
    } else {
        echo "Ошибка при регистрации: " . $conn->error;
    }
}
$stmt->close();
$conn->close();
?>
<button onclick="goBack()">Вернуться на страницу авторизации</button>

<script>
function goBack() {
window.history.back();
}
</script>
</body>
</html>