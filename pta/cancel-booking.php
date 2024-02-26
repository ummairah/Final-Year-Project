<?php
include "config.php";

if (isset($_GET['booking_id'])) {
    $booking_id = $_GET['booking_id'];

    // Delete booking data
    $deleteQuery = "DELETE FROM booking WHERE booking_id = '$booking_id'";
    $deleteResult = mysqli_query($connect, $deleteQuery);

    if ($deleteResult) {
        // Redirect to calendar.php after successful deletion
        header("Location: calendar.php");
        exit();
    } else {
        echo "Error deleting booking data: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request";
}
?>
