<?php
include "../db.php"; 

$query = mysqli_query($conn, "SELECT * FROM clients ORDER BY client_id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Clients List</title>
    <link rel="stylesheet" href="../style.css"> 

</head>
<body>
    <?php include "../nav.php"; ?>

    <div class="content">
        <h1>Clients</h1>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($query)) { ?>
                    <tr>
                        <td><?php echo $row['client_id']; ?></td>
                        <td><?php echo $row['full_name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><a href="clients_edit.php?id=<?php echo $row['client_id']; ?>">Edit</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <p>
            Quick links:
            <a href="clients_add.php">+ Add Client</a>
        </p>
    </div>
</body>
</html>