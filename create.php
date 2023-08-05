<?php
  $servername = "localhost";
  $username = "root";
  $passowrd = "";
  $database = "shop";

  // Create connection

  $connection = new mysqli($servername,$username,$passowrd,$database);



$name = "";
$email = "";
$phone = "";
$address = "";
$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    do {
        if(empty($name) || empty($email) || empty($phone) || empty($address)) {
            $errorMessage = "All fields are required";
            break;
        }
        $sql = "INSERT INTO clients(name,email,phone,address)". "VALUES ('$name','$email','$phone','$address')";
        $result= $connection->query($sql);
        if(!$result) {
            $errorMessage = "Invalid Query";
            break;
        }

        $name = "";
        $email = "";
        $phone = "";
        $address = "";

        $successMessage =  "Client added correctly";
        header("localhost:/crud/index.php");
        exit;
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

        <h2>New Client</h2>
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