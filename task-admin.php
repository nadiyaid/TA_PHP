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
                <li>
                    <a href="attendance.php">
                    <i class="bi bi-calendar-check"></i>Attendance</a>
                </li>
                <li class="active">
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
                    <b class="menu">Task Management Admin</b>
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

            <div class="container">
                <div class="row py-2">
                    <div class="col-md-4 py-3">
                        <div class="header undone-task">
                            <h5>UNDONE</h5>
                        </div>
                        <div class="card" data-toggle="modal" data-target="#taskModal">
                            <div class="card-body">
                                <h5>Bikin Tampilan Web</h5>
                                <p>Bikin tampilan program web pake html css bootstrap react</p>
                                <a href="#" class="stretched-link"></a>
                                <div class="footer text-muted">
                                    2 days ago
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 py-3">
                        <div class="header progress-task">
                            <h5>INPROGRESS</h5>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5>Bikin Tampilan Web</h5>
                                <p>Bikin tampilan program web pake html css bootstrap react</p>
                                <div class="footer text-muted">
                                    2 days ago
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 py-3">
                        <div class="header complete-task">
                            <h5>COMPLETED</h5>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5>Bikin Tampilan Web</h5>
                                <p>Bikin tampilan program web pake html css bootstrap react</p>
                                <a href="#" class="stretched-link"></a>
                                <div class="footer text-muted">
                                    2 days ago
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-2">
                        <div class="card bg-transparent new-task">
                            <div class="card-body">
                                <h6>+ New Task</h6>
                                <a href="#" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                </div>
                     <!-- Modal -->
                     <div id="taskModal" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                    
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel">Task Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row h-100">
                                    <div class="col-8 px-4">
                                        <div class="task-header d-flex">
                                            <h5>Bikin Tampilan Web</h5>
                                            <!-- <div id="ck-button">
                                                <label>
                                                    <input type="checkbox" value="1">
                                                    <span class="bi bi-check2 tooltip-test" title="Mark as Done"></span>
                                                </label>
                                            </div> -->
                                            <button type="button" id="done" class="btn-cancel tooltip-test" title="Mark as Done">
                                                <span class="bi bi-check2 "></span>
                                            </button>
                                        </div>
                                        <p class="tooltip-test" title="Task Description">Bikin tampilan program web pake html css bootstrap react</p>
                                        <div class="comment">
                                            <label>Comment</label>
                                            <textarea class="form-control" disabled></textarea>
                                        </div>
                                        <div class="progbar">Progress</div>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                        </div>
                                    </div>
                                    <div class="col-4 updates">
                                        <div class="card">
                                            <div class="card-body time-task">
                                                <div class="row">
                                                    <div class="col-lg-6 division">
                                                        <p class="text-muted">Created At</p>
                                                        <p class="font-weight-bold">Feb 2, 1:02 pm</p>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <p class="text-muted">Due Date</p>
                                                        <p class="font-weight-bold">Feb 7, 1:02 pm</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="created-info">
                                            <h6>Updates</h6>
                                            <p>Bikin tampilan program web pake html css bootstrap react</p>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-close" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-update">Update</button>
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