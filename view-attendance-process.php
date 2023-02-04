<?php
include_once 'assets/connection.php';

$staff_id = mysqli_real_escape_string($conn, $_POST['staff_id']);
$month = mysqli_real_escape_string($conn, $_POST['month']);

$attendance_query = "SELECT * FROM attendance WHERE staff_id = $staff_id AND month = $month";
$attendance_result = mysqli_query($conn, $attendance_query) or die(mysqli_error($conn));
print_r($attendance_query);
$events = array();
$present_days = 0;
$absent_days = 0;
while ($row = mysqli_fetch_array($attendance_result)) {
    if ($row['status'] == 'present') {
        $present_days++;
    }
    if ($row['status'] == 'absent') {
      $absent_days++;
  }
    $events[] = array(
        'title' => $row['status'],
        'start' => $row['year'] . '-' . $row['month'] . '-' . $row['day'],
        'color' => ($row['status'] == 'present') ? 'green' : 'red'
    );
}



$staff_query = "SELECT * FROM staff WHERE id = $staff_id";
$staff_result = mysqli_query($conn, $staff_query) or die(mysqli_error($conn));
$staff = mysqli_fetch_array($staff_result);

$deductions =  $absent_days * 416.6;
$salary_due = (24 - $absent_days) * 416.6;


mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Attendance Calendar</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css' />
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js'></script>
    <style>
      .info-container {
        background-color: #f2f2f2;
        padding: 20px;
        margin-bottom: 20px;
      }
    </style>
  </head>
  <body>
    <div class="info-container">
      <p><strong>Staff Name:</strong> <?php echo $staff['name'] ?></p>
      <p><strong>Salary Due:</strong> $<?php echo $salary_due ?></p>
      <p><strong>Deductions:</strong> $<?php echo $deductions ?></p>
    </div>
    <div id='calendar'></div>
    <script>
      
    $(document).ready(function() {
        $('#calendar').fullCalendar({
          defaultDate: '<?php echo date('Y').'-'.$month; ?>',
            events: <?php echo json_encode($events) ?>,
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'year,month,agendaWeek,agendaDay'
            }
        });
    });
    </script>
  </body>
</html>