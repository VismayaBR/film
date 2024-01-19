<?php
// Start the session to access session variables
session_start();

// Check if the login_id is set in the session
if (!isset($_SESSION['login_id'])) {
  // Redirect to the login page if the session variable is not set
  header("Location: /film"); // Replace login.php with your login page URL
  exit();
}

// Include your database connection
include '../connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_location'])) {
  $location_id = $_POST['delete_location'];

  // Delete record from the database
  $delete_query = "DELETE FROM location WHERE location_id = '$location_id'";
  $delete_result = mysqli_query($con, $delete_query);

  if ($delete_result) {
      echo '<script>windows.location.reload()</script>';
  } else {
      echo '<script>alert("Failed to delete location. Please try again.");</script>';
  }
}


// Fetch location data for the current session's login_id
$login_id = $_SESSION['login_id'];
$query = "SELECT * FROM location WHERE login_id = '$login_id'";
$result = mysqli_query($con, $query);

// Fetch data and populate the HTML table
// Example code for populating the table


// Close the database connection
mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico" />
    <!-- Add this within the <head> section of your HTML -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  </head>
  <body>
  <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            overflow-x: auto;
            display: block;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        img {
            max-width: 100%;
            height: auto;
        }
    </style>
    
      <!-- partial:partials/_navbar.html -->
     <?php include 'navbar_lender.php'; ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
     <?php include 'sidebar_lender.php'; ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard
              </h3>

            


            </div>
           
         
           
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Locations  </h4>
                 
                    <table>
                      <tr>
<th>
  #
</th>
                      <th>
                        Location
                      </th>

                      <th>
                        Price
                      </th>
                      <th>
                        Details
                      </th>
                      <th>
                        image
                      </th>
                      <th>

                      </th>
                      </tr>
                      
                      <?php 
                      $rowCount = 1;
                      while($row=mysqli_fetch_assoc($result)){ 
                        ?>
                        <tr>
                        <td>
    <?php echo $rowCount; ?>
  </td>
                          <td>
                            <?php echo $row['name']?>
                          </td>
                          <td>
                            <?php echo $row['price']?>
                          </td>
                          <td>
                            <?php echo $row['details']?>
                          </td>
                          <td>
                          <a  href="../uploads/<?php echo $row['image']?>" download><img width='200px' height='200px'  src="../uploads/<?php echo $row['image']?>  "></a>
                          </td>
                          <td>
        <form method='post' >
                    <button type='submit' data-id="<?php echo $row['location_id'] ?>" class='btn btn-danger' name='delete_location' value=" <?php echo $row['location_id'] ?>">Delete</button>
                </form><br>

                
       
       <a href='/film/location_lender/edit_location.php?id="<?php $row['location_id']?>"'> <button type='button' id='editbt' data-id="<?php $row['location_id']?>" class='btn-primary btn' data-toggle='modal' data-target='#exampleModal'>
       &nbsp;&nbsp;Edit&nbsp;&nbsp;&nbsp;</button></a>
      
      
        </td>
                      </tr>


                      <?php
    // Increment the row count
    $rowCount++;
  }
?>
                    
                    </table>
                    









                  </div>
                </div>
              </div>
            
            </div>
          </div>
         
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../assets/js/dashboard.js"></script>
    <script src="../assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
    
  </body>
</html>