<?php
include "../db.php"; 

$query = mysqli_query($conn, "SELECT * FROM booking_tools");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking Tools List</title>
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

    <h1>Booking Tools</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Booking ID</th>
                <th>Tool ID</th>
                <th>Quantity Used</th>
                <th>Date Created</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($query)): ?>
                <tr>
                    <td><?php echo $row['booking_tool_id']; ?></td>
                    <td><strong><?php echo $row['booking_id']; ?></strong></td>
                    <td><?php echo $row['tool_id']; ?></td>
                    <td>₱<?php echo number_format($row['qty_used'], 2); ?></td>
                    <td><?php echo date("M d, Y", strtotime($row['created_at'])); ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</body>
</html>