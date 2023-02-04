<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Mark Attendance</title>
</head>
<body>
  <div class="container mt-5">
    <h1 class="text-center">Staff Attendance</h1>
    <ul class="nav nav-tabs" >
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="mark-attendance.php">Mark Attendance</a>
      </li>
    </ul>
    <section>
      <div>
      <h3 class="text-center mt-5">Mark Attendance</h3>
  <form action="mark_attendance.php" method="post">
    <div class="form-group">
      <label for="staff_id">Staff Name</label>
      <select class="form-control" id="staff_id" name="staff_id" required>
        <?php
            
            require_once 'assets/connection.php';
            $sql = "SELECT id, name FROM staff ORDER BY name ASC";
            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

            if (mysqli_num_rows($result) > 0) {
              // output data of each row
              while($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row["id"]. "'>" . $row["name"]. "</option>";
                }
            }
                mysqli_close($conn);
                ?>
        </select>
    </div>
   
    <div class="form-group">
      <label for="status">Status</label>
      <select class="form-control" id="status" name="status" required>
        <option value="">Select Status</option>
        <option value="Present">Present</option>
        <option value="Absent">Absent</option>
      </select>
    </div>

    <div class="form-group">
      <label for="date">Date</label>
      <input type="text" class="form-control" id="date" name="date" placeholder="Select Date" required>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
  
</section>
</div>
<!-- include jquery for date picker -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha384-ZvpUoO/+PpLXR1lu4jmpXWu80pZlYUAfxl5NsBMWOEPSjUn/6Z/hRTt8+pR6L4N2" crossorigin="anonymous"></script>
<!-- include datepicker library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<!-- include datepicker library css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<script>
    
  // Initialize datepicker
  $('#date').datepicker({
    format: 'yyyy-mm-dd'
  });

  //submit form
    $('form').submit(function(e){
        e.preventDefault();
        var staff_id = $('#staff_id').val();
        var status = $('#status').val();
        var date = $('#date').val();
        //update button
        $('#submit').html('Processing   <i class="fa fa-spinner fa-spin"></i>');
        //disable button
        $('#submit').attr('disabled', true);
        $.ajax({
        url: 'mark_attendance-process.php',
        type: 'POST',
        data: {staff_id: staff_id, status: status, date: date},
        success: function(data){
            if(data == 'success'){
                
        //update button
        $('#submit').html('Submit');
        //disable button
        $('#submit').attr('disabled', false);
                alert('Attendance Marked Successfully');

                //reset form
                $('form')[0].reset();
        }else{
            
        //update button
        $('#submit').html('Submit');
        //disable button
        $('#submit').attr('disabled', false);
            alert('Something went wrong ' + data);
        }
        },
        error: function(data){
            
        //update button
        $('#submit').html('Submit');
        //disable button
        $('#submit').attr('disabled', false);
            alert('Something went wrong ' + data.statusText);
            //console.log(data)
        }

        });

    });
    

  
</script>
</body>
</html>