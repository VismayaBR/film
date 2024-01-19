<?php
include '../connection.php';
$data = mysqli_query($con,"select vacancy.name as vacancy,user.name as user,application.application_id,hiring.name as hiring,application.feedback as feedback from application join user on application.login_id = user.login_id join vacancy on vacancy.vacancy_id = application.vacancy_id join hiring on vacancy.login_id = hiring.login_id");
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
  <body>
    
      <!-- partial:partials/_navbar.html -->
     <?php include 'navbar_admin.php'; ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
     <?php include 'sidebar_admin.php'; ?>
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
                    <h4 class="card-title">Feedback</h4>
                 
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th> # </th>
                          <th> User </th>
                          <th> Vacancy </th>
                          <th> Hiring team </th>
                          <th> Feedback </th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $count=0;
                          while($row = mysqli_fetch_assoc($data)){
                            $count++;
                        ?>
                        <tr>
                          <td><?php echo $count; ?>  </td>
                          <td><?php echo $row['user'] ?> </td>
                          <td>
                          <?php echo $row['vacancy'] ?>
                          </td>
                          <td> <?php echo $row['hiring'] ?></td>
                          <td> <?php echo $row['feedback'] ?> </td>
                          <td><a href="delete.php?id=<?php echo $row['application_id'] ?>" class='btn btn-danger btn-sm'>Delete</a></td>
                        </tr>
                        <?php
                          }
                          ?>
                        
                      </tbody>
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