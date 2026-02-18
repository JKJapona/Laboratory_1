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
                            <p>Active</p>
                        <?php else: ?>
                            <p>Inactive</p>
                        <?php endif; ?>
                    </td>
                    <td><?php echo date("M d, Y", strtotime($row['created_at'])); ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</body>
</html>