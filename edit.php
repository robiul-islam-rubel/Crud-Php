<?php
  $servername = "localhost";
  $username = "root";
  $passowrd = "";
  $database = "shop";

  // Create connection

  $connection = new mysqli($servername,$username,$passowrd,$database);


$id="";
$name = "";
$email = "";
$phone = "";
$address = "";
$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
   if(!isset($_GET['id'])) {
    header("localhost: "/crud/index.php);
    exit;
   }

   $id = $_GET['id'];
   $sql = "SELECT * FROM Clients WHERE id=$id";
   $result = $connection->query($sql);
   $row = $result ->fetch_assoc();

   if(!$row) {
        header("location: /crud/index.php");
        exit;
   }
   $name = $row['name'];
   $email = $row['email'];
   $phone = $row['phone'];
   $address = $row['address'];
}
else {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    do {
        if(empty($name) || empty($email) || empty($phone) || empty($address)) {
            $errorMessage = "All fields are required";
            break;
        }
        $sql = "UPDATE clients"."SET name = '$name',email='$email',phone='$phone',address='$address'".
        "WHERE id=$id";
        $result = $connection->query($sql);
        if(!result) {
            break;
        }
    } while(false);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Create</title>
</head>
<body>

<div class="create-container">
    <form method="post">

        <h2>Update Client</h2>
        <div>
            <label>Name</label>
            <input type="text" class="common" name ="name" value="<?php echo $name ?>">
        </div>
        <div>
            <label>Email</label>
            <input type="email" class="common" name="email" value="<?php echo $email ?>">
        </div>
        <div>
            <label>Phone</label>
            <input type="number" class="common" name="phone" value="<?php echo $phone ?>">
        </div>
        <div>
            <label>Address</label>
            <input type="text" class="common" name ="address" value="<?php echo $address ?>">
        </div>
        <div class="buttons">
            <button type="submit" class="submit">Submit</button>
            <a class="cancel" href="/crud/index.php"> Cancel</a>
        </div>

    </form>
</div>
    
</body>
</html>