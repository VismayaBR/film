
<?php
// Start the session to access session variables
session_start();

// Include your database connection
include '../connection.php';

// Check if the login_id is set in the session
if (!isset($_SESSION['login_id'])) {
    // Redirect to the login page if the session variable is not set
    header("Location: /film"); // Replace login.php with your login page URL
    exit();
}

// Fetch application details including the corresponding vacancy name for the logged-in user
$login_id = $_SESSION['login_id']; // Get the login_id from the session

$query = "SELECT * from previous_work where login_id=$login_id";

$result = mysqli_query($con, $query);
$applications = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
    
  </head>
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
  <body>
    
      <!-- partial:partials/_navbar.html -->
     <?php include 'navbar_user.php'; ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
     <?php include 'sidebar_user.php'; ?>
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
                 
                   
                  
                  
                    <div>
        <h2>Added works</h2>
        <?php if (isset($applications) && !empty($applications)): ?>
        <table >
            <thead>
                <tr>
                    <th>#</th>
                    <th>work name</th>
                    <th>details</th>
                    <th>image</th>
                    <th>Action</th>
                    <!-- Add more columns as per your application table structure -->
                </tr>
            </thead>
            <tbody>
            <?php foreach ($applications as $application): ?>
                <tr>
                    <td><?php echo $application['work_id']; ?></td>
                    <td><?php echo $application['name']; ?></td>
                    <td><?php echo $application['details']; ?></td>
                    <td><a href="../uploads/<?php echo $application['image']; ?>" download><img width='200px' height='200px' src="../uploads/<?php echo $application['image'];  ?>" /></a></td>
                    <td><a class="btn btn-danger" href="remove.php?id=<?php echo $application['work_id'] ?>">Remove</a></td>
                    <!-- Ensure the column name matches the actual name in the vacancy table -->
                    <!-- Add more columns as per your application table structure -->
                </tr>
            <?php endforeach; ?>
            <!-- You can display additional rows here -->
        </tbody>
    </table>
    <?php else: ?>
        <p>No applications found</p>
    <?php endif; ?>
</div>
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