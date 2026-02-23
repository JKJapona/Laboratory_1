<?php
include "../db.php"; 

$query = mysqli_query($conn, "SELECT * FROM services");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Services List</title>
    <link rel="stylesheet" href="../style.css"> 

</head>
<body>
    <?php include "../nav.php"; ?>

    <div class="content">
        <h1>Services</h1>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Service Name</th>
                    <th>Description</th>
                    <th>Hourly Rate</th>
                    <th>Status</th>
                    <th>Date Created</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($query)): ?>
                    <tr>
                        <td><?php echo $row['service_id']; ?></td>
                        <td><strong><?php echo $row['service_name']; ?></strong></td>
                        <td><?php echo $row['description']; ?></td>
                        <td>₱<?php echo number_format($row['hourly_rate'], 2); ?></td>
                        <td>
                            <?php if($row['is_active'] == 1): ?>
                                <p1>Active</p1>
                            <?php else: ?>
                                <p1>Inactive</p1>
                            <?php endif; ?>
                        </td>
                        <td><?php echo date("M d, Y", strtotime($row['created_at'])); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>