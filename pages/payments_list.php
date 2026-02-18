<?php
include "../db.php"; 

$query = mysqli_query($conn, "SELECT * FROM payments");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payments List</title>
    <link rel="stylesheet" href="../style.css"> 

</head>
<body>
    <?php include "../nav.php"; ?>

    <h1>Payments</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Booking ID</th>
                <th>Amount Paid</th>
                <th>Method</th>
                <th>Payment Date</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($query)): ?>
                <tr>
                    <td><?php echo $row['payment_id']; ?></td>
                    <td><?php echo $row['booking_id']; ?></td>
                    <td>₱<?php echo number_format($row['amount_paid'], 2); ?></td>
                    <td><?php echo $row['method']; ?></td>
                    <td><?php echo date("M d, Y", strtotime($row['payment_date'])); ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</body>
</html>