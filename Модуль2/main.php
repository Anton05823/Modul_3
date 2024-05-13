<!DOCTYPE html>
<html>
<head>
    <title>Site</title>
    <style>
        body {
            margin-top: 50px;
            margin-left: 20px;
            padding: 0;
            font-family: sans-serif;
            background-color: rgb(247, 247, 247);
        }

        table {
            margin: 0 auto;
            border-spacing: 0;
            width: 800px;
            color: #050408;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 2px solid #050408;
        }

        form {
            margin-top: 25px;
            color: #050408;
            width: 400px;
        }

        input[type="text"] {
            padding: 10px 5px 10px 5px;
            border: 1px solid rgb(178, 178, 178);
            box-sizing : content-box;
            border-radius: 3px;
            margin: 5px 0;
            width: 100%;
        }

        input[type="submit"] {
            padding: 5px;
            margin: 5px 0;
            cursor: pointer;
            background: rgb(61, 157, 179);
            padding: 8px 5px;
            border: 1px solid rgb(28, 108, 122);
            border-radius: 3px;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
            margin: 0 auto;
        }

        input[type="submit"]:hover {
            background: rgb(74, 179, 198);
        }

        .grid{
          margin-top: 50px;
          display: grid;
          grid-template-columns: repeat(3, 1fr);
        }
    </style>
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
    $sql = "SELECT * FROM klienti";
    $result = $conn->query($sql); 

    if ($result->num_rows > 0) 
    { 
        echo "<table><tr><th>Идентификатор</th><th>Фамилия</th><th>Имя</th><th>Отчество</th><th>Номер счета</th><th>Номер полиса</th><th>телефон</th></tr>"; 
        while($row = $result->fetch_assoc()) 
        { 
            echo "<tr><td>".$row["id_klienta"]."</td><td>".$row["fam"]."</td><td>".$row["imya"]."</td><td>".$row["otch"]."</td><td>".$row["nomer_sheta"]."</td><td>".$row["nomer_polisa"]."</td><td>".$row["telefon"]."</td></tr>"; 
        } 
            echo "</table>"; 
        } 
        else 
        { 
            echo "0 results"; 
        } 

        // Форма редактирования и удаления 
        echo "<div class='grid'><div>";
        echo "<form action='insert_data.php' method='post'>"; 
        echo "Фамилия: <input type='text' id='fam' name='fam'><br>"; 
        echo "Имя: <input type='text' id='imya' name='imya'><br>"; 
        echo "Отчество: <input type='text' id='otch' name='otch'><br>"; 
        echo "Номер счета: <input type='text' id='nomer_sheta' name='nomer_sheta'><br>"; 
        echo "Номер полиса: <input type='text' id='nomer_polisa' name='nomer_polisa'><br>"; 
        echo "Телефон: <input type='text' id='telefon' name='telefon'><br>"; 
        echo "<input type='submit' value='Добавить'><br>"; 
        echo "</form></div>";
        
        echo "<div><form action='update_data.php' method='post'>"; 
        echo "Фамилия: <input type='text' id='fam' name='fam'><br>"; 
        echo "Имя: <input type='text' id='imya' name='imya'><br>"; 
        echo "Отчество: <input type='text' id='otch' name='otch'><br>"; 
        echo "Номер счета: <input type='text' id='nomer_sheta' name='nomer_sheta'><br>"; 
        echo "Номер полиса: <input type='text' id='nomer_polisa' name='nomer_polisa'><br>"; 
        echo "Телефон: <input type='text' id='telefon' name='telefon'><br>"; 
        echo "Идентификатор: <input type='text' name='id' id='id'>";  echo "<input type='submit' value='Редактировать'>"; 
        echo "</form></div>"; 

        echo "<div><form action='delete_data.php' method='post'>"; 
        echo "Идентификатор: <input type='text' name='id' id='id'>"; 
        echo "<input type='submit' value='Удалить'>"; 
        echo "</form></div></div>"; 

        $conn->close(); 
    ?>
</body>

</html>