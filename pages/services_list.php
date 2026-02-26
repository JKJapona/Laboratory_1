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
                    <th>Hourly Rate</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($query)) { ?>
                    <tr>
                        <td><?php echo $row['service_id']; ?></td>
                        <td><strong><?php echo $row['service_name']; ?></strong></td>
                        <td>₱<?php echo number_format($row['hourly_rate'], 2); ?></td>
                        <td><?php echo $row['is_active'] ? "Yes" : "No"; ?></td>
                        <td><a href="services_edit.php?id=<?php echo $row['service_id']; ?>">Edit</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>