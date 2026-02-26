<?php
    include "../db.php";
    
    $message = "";
    
    // ASSIGN TOOL
    if (isset($_POST['assign'])) {
    $booking_id = $_POST['booking_id'];
    $tool_id = $_POST['tool_id'];
    $qty = $_POST['qty_used'];
    
    $toolRow = mysqli_fetch_assoc(mysqli_query($conn, "SELECT quantity_available FROM tools WHERE tool_id=$tool_id"));
    
    if ($qty > $toolRow['quantity_available']) {
        $message = "Not enough available tools!";
    } else {
        mysqli_query($conn, "INSERT INTO booking_tools (booking_id, tool_id, qty_used)
        VALUES ($booking_id, $tool_id, $qty)");
    
        mysqli_query($conn, "UPDATE tools SET quantity_available = quantity_available - $qty WHERE tool_id=$tool_id");
    
        $message = "Tool assigned successfully!";
    }
}
 
$tools = mysqli_query($conn, "SELECT * FROM tools ORDER BY tool_name ASC");
$bookings = mysqli_query($conn, "SELECT booking_id FROM bookings ORDER BY booking_id DESC");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Booking Tools List</title>
        <link rel="stylesheet" href="../style.css"> 

    </head>
    <body>
        <?php include "../nav.php"; ?>
        <div class="content">
            <h1>Booking Tools</h1>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Quantity Total</th>
                        <th>Quantity Available</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($t = mysqli_fetch_assoc($tools)) { ?>
                        <tr>
                            <td><?php echo $t['tool_name']; ?></td>
                            <td><?php echo $t['quantity_total']; ?></td>
                            <td><?php echo $t['quantity_available']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <hr>
            
            <div class="form-header">
                <h2>Assign Tool to Booking</h2>
            </div>
            
            <div class="form-container">
                <form method="post">
                    <div class="form-group">
                        <label>Booking ID</label>
                        <select name="booking_id">
                            <?php while($b = mysqli_fetch_assoc($bookings)) { ?>
                            <option value="<?php echo $b['booking_id']; ?>">#<?php echo $b['booking_id']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Tool</label>
                        <select name="tool_id">
                            <?php
                            $tools2 = mysqli_query($conn, "SELECT * FROM tools ORDER BY tool_name ASC");
                            while($t2 = mysqli_fetch_assoc($tools2)) {
                            ?>
                            <option value="<?php echo $t2['tool_id']; ?>">
                                <?php echo $t2['tool_name']; ?> (Avail: <?php echo $t2['quantity_available']; ?>)
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Qty Used</label>
                        <input type="number" name="qty_used" min="1" value="1">
                    </div>
                    
                    <button type="submit" class="btn-submit" name="assign">Assign</button>
                </form>
            </div>
        </div>
    </body>
</html>