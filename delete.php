<?php
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $servername = "localhost";
    $username = "root";
    $passowrd = "";
    $database = "shop";

    $connection = new mysqli($servername,$username,$passowrd,$database);
    $sql = "DELETE FROM Clients WHERE id=$id";
    $connection->query($sql);

}

header("location: /crud/index.php");
exit;

?>