<?php
include "../db.php"; 

$query = mysqli_query($conn, "SELECT * FROM clients");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Clients List</title>
    <link rel="stylesheet" href="../style.css"> 

    <style>
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 20px; 
        }

        th, td { 
            border: 1px solid #ddd; 
            padding: 10px; 
            text-align: left; 
        }
    </style>
</head>
<body>
    <?php include "../nav.php"; ?>

    <h1>Clients</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Date Created</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($query)): ?>
                <tr>
                    <td><?php echo $row['client_id']; ?></td>
                    <td><strong><?php echo $row['full_name']; ?></strong></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>₱<?php echo number_format($row['phone'], 2); ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo date("M d, Y", strtotime($row['created_at'])); ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</body>
</html>