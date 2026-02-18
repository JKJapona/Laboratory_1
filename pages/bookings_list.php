<?php
include "../db.php"; 

$query = mysqli_query($conn, "SELECT * FROM bookings");
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Bookings List</title>
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

        <h1>Bookings</h1>

        <table>
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Client ID</th>
                    <th>Service ID</th>
                    <th>Date</th>
                    <th>Hours</th>
                    <th>Rate Snapshot</th>
                    <th>Total Cost</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($query)): ?>
                    <tr>
                        <td><?php echo $row['booking_id']; ?></td>
                        <td><?php echo $row['client_id']; ?></td>
                        <td><?php echo $row['service_id']; ?></td>
                        <td><?php echo $row['booking_date']; ?></td>
                        <td><?php echo $row['hours']; ?></td>
                        <td>₱<?php echo number_format($row['hourly_rate_snapshot'], 2); ?></td>
                        <td>₱<?php echo number_format($row['total_cost'], 2); ?></td>
                        <td><?php echo $row['status']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </body>
</html>