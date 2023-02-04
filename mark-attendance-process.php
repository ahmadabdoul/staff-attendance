<?php
  require_once('assets/connection.php');
  
  if (isset($_POST['staff_id']) && isset($_POST['status']) && isset($_POST['date'])) {
    // Sanitize data
    $staff_id = mysqli_real_escape_string($conn, $_POST['staff_id']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);

    //seperate yy,mm,dd from date
    $date_sep = explode('-', $date);
    $year = $date_sep[0];
    $month = $date_sep[1];
    $day = $date_sep[2];
  
    // Check if there is a deduction
    
    // Insert data into database
    $query = "INSERT INTO attendance (staff_id, status, date, year, month, day)
              VALUES ('$staff_id', '$status', '$date', '$year', '$month', '$day')";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
  
    if ($result) {
      // Success
      echo "success";
    } else {
      // Error
      echo "Error: " . mysqli_error($conn);
    }
  }else{
    echo "Error: All fields are required";
  }
?>
