<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Attendance and Task Management</title>

    <!-- bootstrap css cdn -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- custom css -->
    <link rel="stylesheet" href="css/style.css" />

    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>

<body>
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    
     <!-- JavaScript Bundle with Popper -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>

     <!-- bootstrap js -->
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

     <script type="text/javascript">
        $(document).ready(function () {
   
           $('#sidebarCollapse').on('click', function () {
               $('#sidebar').toggleClass('active');
           });
       
       });
       </script>

    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <a href="#">
                    <img src="img/logo.png" alt="logo" width="190" height="80" class="logo">
                </a>
                <strong>SDMN</strong>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="dashboard.php">
                    <i class="bi bi-grid"></i>Dashboard</a>
                </li>
                <li class="active">
                    <a href="attendance.php">
                    <i class="bi bi-calendar-check"></i>Attendance</a>
                </li>
                <li>
                    <a href="task.php">
                    <i class="bi bi-list-task"></i>Task</a>
                </li>
                <li>
                    <a href="user.php">
                    <i class="bi bi-person"></i>User</a>
                </li>
                <li>
                    <a href="login.php">
                    <i class="bi bi-power"></i>Logout</a>
                </li>
            </ul>
        </nav>
        <!-- /#sidebar-wrapper -->

        <div class="w-100" id="main-content">
            <nav class="navbar">
                <h5>
                    <button type="button" id="sidebarCollapse" class="btn">
                        <span class="bi bi-list"></span>
                    </button>
                    <b class="menu">Attendance</b>
                </h5>

                <!-- <div class="search-wrapper">
                    <span class="bi bi-search"></span>
                    <input type="search" />
                </div> -->

                <div class="user-wrapper dropdown">
                    <div>
                        <a href="user.php" class="user"><img src="img/img.png" width="40px" height="40px" alt="">
                        Admin</a>
                        <div class="dropdown-content">
                            <a href="user.php" class="profile">Profile</a>
                            <a href="login.php">Logout</a>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="container attendance">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body d-flex">
                                <button type="button" class="btn btn-info btn-request">
                                    <div class="maintext">Request</div>
                                    <div class="subtext">for paid leave</div>
                                </button>
                                <button type="button" class="btn btn-info btn-checkin">Check-In</button>
                                <button type="button" class="btn btn-info btn-checkout">Check-out</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row table-attendance">
                    <div class="col-12 mt-4 py-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="header">
                                    <h5 class="title">Daily Attendance</h5>
                                    <text-muted>for a week</text-muted>
                                </div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>DATE</th>
                                            <th>CHECK-IN</th>
                                            <th>CHECK-OUT</th>
                                            <th>TOTAL HOURS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>11,Jan</td>
                                            <td>09:45</td>
                                            <td>17:46</td>
                                            <td>8:01 Hours</td>
                                        </tr>
                                        <tr>
                                            <td>12,Jan</td>
                                            <td>09:06</td>
                                            <td>18:00</td>
                                            <td>8:54 Hours</td>
                                        </tr>
                                        <tr>
                                            <td>13,Jan</td>
                                            <td>09:03</td>
                                            <td>17:34</td>
                                            <td>8:31 Hours</td>
                                        </tr>
                                        <tr>
                                            <td>14,Jan</td>
                                            <td>10:00</td>
                                            <td>18:35</td>
                                            <td>8:35 Hours</td>
                                        </tr>
                                        <tr>
                                            <td>15,Jan</td>
                                            <td>09:15</td>
                                            <td>17:55</td>
                                            <td>8:40 Hours</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/#wrapper-->
</body>
</html>