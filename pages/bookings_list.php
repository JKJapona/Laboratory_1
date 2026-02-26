<?php
include "../db.php"; 

$sql = "SELECT 
            bookings.*, 
            clients.full_name AS client_name, 
            services.service_name 
        FROM bookings
        JOIN clients ON bookings.client_id = clients.client_id
        JOIN services ON bookings.service_id = services.service_id";

$query = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Bookings List</title>
        <link rel="stylesheet" href="../style.css"> 

    </head>
    <body>
        <?php include "../nav.php"; ?>
        <div class="content">
            <h1>Bookings</h1>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Client</th>
                        <th>Service</th>
                        <th>Date</th>
                        <th>Hours</th>
                        <th>Rate Snapshot</th>
                        <th>Total Cost</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($query)) { ?>
                        <tr>
                            <td><?php echo $row['booking_id']; ?></td>
                            <td><?php echo $row['client_name']; ?></td>
                            <td><?php echo $row['service_name']; ?></td>
                            <td><?php echo $row['booking_date']; ?></td>
                            <td><?php echo $row['hours']; ?></td>
                            <td>₱<?php echo number_format($row['hourly_rate_snapshot'], 2); ?></td>
                            <td>₱<?php echo number_format($row['total_cost'], 2); ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td><a href="payment_process.php?booking_id=<?php echo $row['booking_id']; ?>">Pay</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </body>
</html>