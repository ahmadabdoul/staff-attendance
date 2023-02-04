<?php
  require_once('assets/connection.php');
  
  if (isset($_POST['staff_id']) && isset($_POST['status']) && isset($_POST['date'])) {
    // Sanitize data
    $staff_id = mysqli_real_escape_string($conn, $_POST['staff_id']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
  
    // Check if there is a deduction
    $deduction = 0;
    if ($status == 'Absent') {
      $deduction = 50;
    }
  
    // Insert data into database
    $query = "INSERT INTO attendance (staff_id, status, date, deduction)
              VALUES ('$staff_id', '$status', '$date', $deduction)";
    $result = mysqli_query($conn, $query);
  
    if ($result) {
      // Success
      echo "Attendance marked successfully";
    } else {
      // Error
      echo "Error: " . mysqli_error($conn);
    }
  }else{
    echo "Error: All fields are required";
  }
?>
