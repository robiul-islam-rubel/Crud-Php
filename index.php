<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>MyShop</title>
</head>
<body>

<div class="main-container">
<div>
    <h1>List of Clients</h1>
</div>
<div class='new'>
    <a class="btn" href="/crud/create.php">New Client</a>
</div>
<table>
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Email</td>
        <td>Phone</td>
        <td>Address</td>
        <td>Action</td>
    </tr>
<?php  

        $servername = "localhost";
        $username = "root";
        $passowrd = "";
        $database = "shop";

        // Create connection

        $connection = new mysqli($servername,$username,$passowrd,$database);

        // Check connection

        if($connection->connect_error) {
            die("Connection Failed : ".$connection->connect_error);
        }

        // read all data from database
        
        $sql = "SELECT * FROM clients";
        $result = $connection->query($sql);

        if(!$result) {
            die("Invalid Query");
        }

        // read data of each row


        while($row = $result->fetch_assoc()) {
            echo "
            <tr>
                <td>$row[id]</td>
                <td>$row[name]</td>
                <td>$row[email]</td>
                <td>$row[phone]</td>
                <td>$row[address]</td>
                <td>
                    <a href='/crud/edit.php?id=$row[id]' class='edit'>Edit </a>
                    <a href='/crud/delete.php?id=$row[id]' class='delete'>Delete </a>
                </td>
            </tr>
            ";
        }


?>
 
</table>
</div>
 
    
</body>
</html>