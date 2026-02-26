<?php
include "../db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    extract($_POST);

    $service_query = $conn->query("SELECT hourly_rate FROM services WHERE service_id = '$service_id'");
    $service = $service_query->fetch_assoc();
    $rate = $service['hourly_rate'];

    $total_cost = $rate * $hours;

    $sql = "INSERT INTO bookings (client_id, service_id, booking_date, hours, hourly_rate_snapshot, total_cost, status) 
            VALUES ('$client_id', '$service_id', '$booking_date', '$hours', '$rate', '$total_cost', 'PENDING')";
    
    $conn->query($sql);
    header("Location: bookings_list.php");
}

$clients = $conn->query("SELECT client_id, full_name FROM clients");
$services = $conn->query("SELECT service_id, service_name, hourly_rate FROM services");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create Booking</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php include "../nav.php"; ?>

    <div class="content">
        <div class="form-header">
            <h1>Create New Booking</h1>
        </div>
        

        <div class="form-container">
            <form method="POST">

                <div class="form-group">
                    <label>Select Client</label>

                    <select name="client_id" required>
                        <?php while($c = $clients->fetch_assoc()): ?>

                            <option value="<?php echo $c['client_id']; ?>">
                                <?php echo $c['full_name']; ?>
                            </option>

                        <?php endwhile; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Select Service</label>

                    <select name="service_id" required>
                        <?php while($s = $services->fetch_assoc()): ?>

                            <option value="<?php echo $s['service_id']; ?>
                                "><?php echo $s['service_name']; ?> 
                                (₱<?php echo $s['hourly_rate']; ?>/hr)
                            </option>
                            
                        <?php endwhile; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Booking Date</label>
                    <input type="date" name="booking_date" required>
                </div>

                <div class="form-group">
                    <label>Number of Hours</label>
                    <input type="number" name="hours" min="1" value="1" required>
                </div>

                <button type="submit" class="btn-submit">Create Booking</button>
            </form>
        </div>
    </div>
</body>
</html>