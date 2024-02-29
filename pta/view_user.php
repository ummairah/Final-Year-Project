  <?php include "config.php" ?>
  <?php session_start(); ?>

  <?php
  if (!isset($_SESSION['id'])) {
    header('location: login.php');
  }
  ?>

  <?php
  if (isset($_POST['signout'])) {
    session_destroy();
    header('location:index.php');
  }
  ?>

  <?php
  $id = isset($_GET['id']) ? $_GET['id'] : null;
  ?>

  <?php
  if (isset($_POST['approve'])) {

    $id = $_POST['id'];
    $select = "UPDATE booking SET status = 'complete' WHERE id = '$id' ";
    $resut = mysqli_query($conn, $select);
    header("location:view_user.php");
  }

  if (isset($_POST['delete'])) {

    $id = $_POST['id'];
    $select = "DELETE  FROM booking  WHERE id = '$id' ";
    $resut = mysqli_query($conn, $select);
    header("location:view_user.php");
  }
  ?>

  <?php
  function getStatusColor($status)
  {
    switch ($status) {
      case 'pending':
        return '#ffcc00'; // Yellow background for 'pending'
      case 'completed':
        return '#49bd47'; // Green background for 'completed'
        // case 'rejected':
        //   return '#ff0000'; // Red background for 'rejected'
      default:
        return ''; // Default background color
    }
  }
  ?>

  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container">
        <a class="navbar-brand" href="index.php"><img src="icon/logo.ico" alt="" width="100" height="80"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link " aria-current="page" href="calendar.php?id=<?php echo $user_id = $_SESSION['id']; ?>">Book</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="view_user.php?id=<?php echo $user_id = $_SESSION['id']; ?>"> View History</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="view_complaint.php?id=<?php echo $user_id = $_SESSION['id']; ?>"> View Complaint </a>
            </li>
            &nbsp;
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-user fa-lg" style="color: #297f33;"></i></a>
              <ul class="dropdown-menu">
                <li>
                  <form action="" method="post" style="margin: 0; padding: 0;">
                    <input type="hidden" name="signout" value="1">
                    <button type="submit" class="dropdown-item" style="color: #ff0000; border: none; background: none; cursor: pointer;">Log Out</button>
                  </form>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <br>
    <div class="container col-12 border rounded mt-6 bg-body-tertiary">
      <br>
      <h2 class="text-center"> Booking History </h2>
      <br>

      <!-- for booking section -->
      <table class="table table-bordered align-middle mb-0 bg-whipte text-center">
        <thead class="bg-success">
          <tr>
            <th scope="col">Place</th>
            <th scope="col">Date</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <?php
        $user_id = $_SESSION['id'];
        $query = "SELECT * FROM  booking WHERE user_id = '$user_id' AND (status = 'pending' OR status = 'completed' OR status = 'canceled') ORDER BY date DESC";
        $result = mysqli_query($connect, $query);

        while ($row = mysqli_fetch_array($result)) {
          // Fetch total for each booking
          $booking_id = $row['booking_id'];
          $total_query = "SELECT total FROM booking WHERE booking_id = '$booking_id'";
          $total_result = mysqli_query($connect, $total_query);
          $total_row = mysqli_fetch_assoc($total_result);
          $total = $total_row['total'];
        ?>
          <tbody>
            <tr>
              <!-- <th scope="row"> <?php echo $row['user_id']; ?> </th> -->
              <td> <?php echo $row['place']; ?> </td>
              <td> <?php echo $row['date']; ?> </td>
              <td>
                <?php
                $statusColor = getStatusColor($row['status']);

                $badgeClass = ($row['status'] == 'completed') ? 'badge-success' : (($row['status'] == 'pending') ? 'badge-warning' : 'badge-danger');
                ?>
                <span class="badge badge-pill <?php echo $badgeClass; ?> opacity-75" style="background-color: <?php echo $statusColor; ?>; border-radius: 50px; padding: 4px 4px; color: white;">
                  <?php echo $row['status']; ?>
                </span>
              </td>
              <td>
                <!-- PENDING -->
                <?php if ($row['status'] == 'pending') { ?>
                  <?php
                  // Check if payment has been made for this booking
                  $checkPaymentQuery = "SELECT * FROM payment WHERE booking_id = '{$row['booking_id']}'";
                  $checkPaymentResult = mysqli_query($connect, $checkPaymentQuery);

                  if (mysqli_num_rows($checkPaymentResult) > 0) {
                    // Payment has been made
                  ?>
                    <button type="button" class="btn btn-success" disabled> Paid </button>
                  <?php } else { ?>
                    <!-- Payment not made, display "Pay" button -->
                    <a href="payment-form.php?booking_id=<?php echo $row['booking_id']; ?>&total=<?php echo $total; ?>">
                      <button type="button" class="btn btn-outline-success" data-toggle="modal"> Pay </button>
                    </a>
                  <?php } ?>

                  <!-- <button type="button" class="btn btn-outline-primary" data-toggle="modal" disabled> Complain </button> -->

                  <!-- Cancel -->
                  <a href="cancel_booking.php?booking_id=<?php echo $row['booking_id']; ?>" style="text-decoration: none;">
                    <button type="button" class="btn btn-outline-danger cancel-btn"> Cancel </button>
                  </a>

                  <!-- COMPLETED -->
                <?php } elseif ($row['status'] == 'completed') { ?>
                  <a href="user_complain.php?id=<?php echo $row['user_id']; ?>" style="text-decoration: none;">
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal"> Complain </button>
                  </a>

                  <!-- Add "Print" button -->
                  <a href="print_test.php?id=<?php echo $booking_id; ?>">
                    <button type="button" class="btn btn-outline-info"> Print </button>
                  </a>

                  <!-- CANCELED -->
                <?php } elseif ($row['status'] == 'canceled') { ?>
                  <!-- Display "Complain" button for canceled bookings -->
                  <a href="user_complain.php?id=<?php echo $row['user_id']; ?>" style="text-decoration: none;">
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal"> Complain </button>
                  </a>
                <?php } ?>
              </td>

            </tr>
          </tbody>
        <?php } ?>

        <!-- for past booking section -->
      </table>
      <br>
      <h2 class="text-center"> Past Booking </h2>
      <br>
      <table class="table table-bordered align-middle mb-0 bg-whipte text-center">
        <thead class="bg-success">
          <tr>
            <th scope="col">Place</th>
            <th scope="col">Date</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>

          <?php
          $user_id = $_SESSION['id'];
          $query = "SELECT * FROM  canceled_book WHERE user_id = '$user_id' AND (status = 'canceled') ORDER BY date DESC";
          $result = mysqli_query($connect, $query);

          while ($row = mysqli_fetch_array($result)) {
          ?>

        <tbody>
          <tr>
            <!-- <th scope="row"> <?php echo $row['user_id']; ?> </th> -->
            <td> <?php echo $row['place']; ?> </td>
            <td> <?php echo $row['date']; ?> </td>
            <td>
              <?php
              $statusColor = getStatusColor($row['status']);

              $badgeClass = ($row['status'] == 'completed') ? 'badge-success' : (($row['status'] == 'pending') ? 'badge-warning' : 'badge-danger');
              ?>
              <span class="badge badge-pill <?php echo $badgeClass; ?> opacity-75" style="background-color: <?php echo $statusColor; ?>; border-radius: 50px; padding: 4px 4px; color: white;">
                <?php echo $row['status']; ?>
              </span>
            </td>
            <!-- // Assuming this is inside a loop displaying booking history -->
            <td>
              <?php if ($row['status'] == 'canceled') { ?>
                <a href="user_complain.php?id=<?php echo $row['user_id']; ?>" style="text-decoration: none;">
                  <button type="button" class="btn btn-outline-primary" data-toggle="modal"> Complain </button>
                </a>
              <?php } ?>
            </td>
          </tr>
        </tbody>
      <?php } ?>
      </thead>
      </table>
      <br>
    </div>
  </body>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const cancelBtns = document.querySelectorAll('.cancel-btn');

      cancelBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
          // Add any additional logic here before redirecting if needed
          window.location.href = 'calendar.php'; // Redirect to calendar.php
        });
      });
    });
  </script>