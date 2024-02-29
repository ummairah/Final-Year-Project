<?php
include "config.php";

if (isset($_GET['booking_id'])) {
    $booking_id = $_GET['booking_id'];

    // Retrieve data before deletion
    $selectQuery = "SELECT * FROM booking WHERE booking_id = '$booking_id'";
    $selectResult = mysqli_query($connect, $selectQuery);
    $bookingData = mysqli_fetch_assoc($selectResult);

    // Insert into canceled_book table
    $insertQuery = "INSERT INTO canceled_book (booking_id, user_id, place, date, total, status) VALUES ('{$bookingData['booking_id']}', '{$bookingData['user_id']}', '{$bookingData['place']}', '{$bookingData['date']}', '{$bookingData['total']}', 'canceled')";
    $insertResult = mysqli_query($connect, $insertQuery);

    if ($insertResult) {
        // Delete booking data
        $deleteQuery = "DELETE FROM booking WHERE booking_id = '$booking_id'";
        $deleteResult = mysqli_query($connect, $deleteQuery);

        if ($deleteResult) {
            // Redirect to calendar.php after successful deletion
            header("Location: calendar.php");
            exit();
        } else {
            echo "Error deleting booking data: " . mysqli_error($connect);
        }
    } else {
        echo "Error moving data to canceled_book table: " . mysqli_error($connect);
    }
} else {
    echo "Invalid request";
}
?>
