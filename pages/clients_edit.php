<?php
    include "../db.php";
    
    $id = $_GET['id'];
    
    $get = mysqli_query($conn, "SELECT * FROM clients WHERE client_id = $id");
    $client = mysqli_fetch_assoc($get);
    
    $message = "";
    
    if (isset($_POST['update'])) {
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        
        if ($full_name == "" || $email == "") {
            $message = "Name and Email are required!";
        } else {
            $sql = "UPDATE clients
                    SET full_name='$full_name', email='$email', phone='$phone', address='$address'
                    WHERE client_id=$id";
            mysqli_query($conn, $sql);
            header("Location: clients_list.php");
            exit;
        }
    }
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Edit Client</title>
        <link rel="stylesheet" href="../style.css"> 
    </head>
    <body>
        <?php include "../nav.php"; ?>
        
        <div class="content">
            <div class="form-header">
                <h1>Edit Client</h1>
            </div>


            <div class="form-container">
                <p2 style="color:red;"><?php echo $message; ?></p2>
                
                <form method="post">
                    <div class="form-group">
                        <label>Full Name*</label>
                        <input type="text" name="full_name" value="<?php echo $client['full_name']; ?>">
                    </div>
                        
                    <div class="form-group">
                        <label>Email*</label>
                        <input type="email" name="email" value="<?php echo $client['email']; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" value="<?php echo $client['phone']; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" value="<?php echo $client['address']; ?>">
                    </div>
                    
                    <button type="submit" class="btn-submit" name="update">Update</button>
                </form>
            </div>
        </div>
    </body>
</html>
 