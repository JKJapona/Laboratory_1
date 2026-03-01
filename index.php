<?php
    session_start();
    include "db.php";
    
    $clients = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS c FROM clients"))['c'];
    $services = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS c FROM services"))['c'];
    $bookings = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS c FROM bookings"))['c'];
    
    $revRow = mysqli_fetch_assoc(mysqli_query($conn, "SELECT IFNULL(SUM(amount_paid),0) AS s FROM payments"));
    $revenue = $revRow['s'];
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Dashboard</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php include "nav.php"; ?>
        
        <div class="content">
            <h1>Dashboard</h1>
            <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
            
            <div class="kpi_container">
                <a href="/assessment_beginner/pages/clients_list.php" class="kpi_card">
                    <span>Total Clients</span>
                    <div class="value"><?php echo $clients; ?></div>
                </a>

                <a href="/assessment_beginner/pages/services_list.php" class="kpi_card">
                    <span>Total Services</span>
                    <div class="value"><?php echo $services; ?></div>
                </a>

                <a href="/assessment_beginner/pages/bookings_list.php" class="kpi_card">
                    <span>Total Bookings</span>
                    <div class="value"><?php echo $bookings; ?></div>
                </a>

                <a href="/assessment_beginner/pages/payments_list.php" class="kpi_card">
                    <span>Total Revenue</span>
                    <div class="value">₱<?php echo number_format($revenue, 2); ?></div>
                </a>
            </div>
            
            <p>
                Quick links:
                <a href="/assessment_beginner/pages/clients_add.php">Add Client</a> |
                <a href="/assessment_beginner/pages/bookings_create.php">Create Booking</a>
            </p>
        </div>
    </body>
</html>