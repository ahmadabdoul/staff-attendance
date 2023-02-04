<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Staff Attendance</title>
</head>
<body>
  <div class="container mt-5">
    <h1 class="text-center">Staff Attendance</h1>
    <ul class="nav nav-tabs" id="myTab" role="tablist" >
      <li class="nav-item">
        <a class="nav-link active" href="">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="mark-attendance.php">Mark Attendance</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="view-attendance.php">View Attendance</a>
      </li>
    </ul>
    <section>
      <div>
        <table class="table table-striped mt-5">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Salary</th>
              <th scope="col">Position</th>
              <th scope="col">Date Hired</th>
              
            </tr>
          </thead>
          <tbody>
        <?php

            require_once 'assets/connection.php';

            $sql = "SELECT id, name, salary, position, date_hired FROM staff";
            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

            if (mysqli_num_rows($result) > 0) {
              // output data of each row
              while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["id"]. "</td>";
                echo "<td>" . $row["name"]. "</td>";
                echo "<td>" . $row["salary"]. "</td>";
                echo "<td>" . $row["position"]. "</td>";
                echo "<td>" . $row["date_hired"]. "</td>";
               
                echo "</tr>";
                }
            } else {
                echo "0 results";
                }
                mysqli_close($conn);
    ?>
      </tbody>
    </table>
  </div>
  
</section>
</div>
</body>
</html>