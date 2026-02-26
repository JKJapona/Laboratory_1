<?php
include "../db.php"; 

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $email     = $_POST['email'];
    $phone     = $_POST['phone'];
    $address   = $_POST['address'];

    if ($full_name == "" || $email == "") {
        $message = "Name and Email are required!";
    } else {
        $sql = "INSERT INTO clients (full_name, email, phone, address)
            VALUES ('$full_name', '$email', '$phone', '$address')";
        mysqli_query($conn, $sql);
        header("Location: clients_list.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Client</title>
        <link rel="stylesheet" href="../style.css"> 
    </head>
    <body>
        <?php include "../nav.php"; ?>

        <div class="content">
            <div class="form-header">
                <h1>Add Client</h1>
            </div>
            
            <div class="form-container">
                <p2 style="color:red;"><?php echo $message; ?></p2>
                
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" name="full_name" required placeholder="Juan Dela Cruz">
                    </div>

                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" required placeholder="juan@example.com">
                    </div>

                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone">
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <textarea name="address" rows="3"></textarea>
                    </div>

                    <button type="submit" class="btn-submit">Add Client</button>
                </form>
            </div>
        </div>
    </body>
</html>