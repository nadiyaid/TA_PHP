<?php
    include 'koneksi.php';
    session_start();
    include 'validation.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Attendance and Task Management</title>

    <!-- bootstrap css cdn -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
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
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    
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
                    <a href="dashboard-superadmin.php">
                    <i class="bi bi-grid"></i>Dashboard</a>
                </li>
                <li>
                    <a href="#attSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="bi bi-calendar-check"></i>Attendance</a>
                    <ul class="collapse list-unstyled" id="attSubmenu">
                        <li>
                            <a href="attendance-superadmin.php">Submit Attendance</a>
                        </li>
                        <li>
                            <a href="manage-attendance.php">Manage User Attendance</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#userSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="bi bi-person"></i>User</a>
                    <ul class="list-unstyled" id="userSubmenu">
                        <li class="active">
                            <a href="manage-user.php">Manage User</a>
                        </li>
                        <li>
                            <a href="profile-superadmin.php">Profile</a>
                        </li>
                    </ul>
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
                    <b class="menu">User List</b>
                </h5>

                <!-- <div class="search-wrapper">
                    <span class="bi bi-search"></span>
                    <input type="search" />
                </div> -->

                <div class="user-wrapper dropdown">
                    <div>
                        <a href="profle-superadmin.php" class="user"><img src="img/img.png" width="40px" height="40px" alt="">
                        <?=$_SESSION['name'];?></a>
                        <div class="dropdown-content">
                            <a href="profile-superadmin.php" class="profile">Profile</a>
                            <a href="logout.php">Logout</a>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="container user-list">
                <div class="row table-user">
                    <div class="col-12 mt-4 py-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="header">
                                    <h5 class="title">Employee</h5>
                                </div>

                                <div class="createbtn">
                                    <a href="add-user.php" class="btn addbtn" data-toggle="modal" data-target="#addUser">Add New</a>
                                </div>

                                <table class="table" id="tblUsr">
                                    <thead>
                                        <tr>
                                            <th>NAME</th>
                                            <th>POSITION</th>
                                            <th>EMAIL</th>
                                            <th>ROLE</th>
                                            <th style="text-align: center;">ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $connection = mysqli_connect("localhost", "root", "", "kehadiran");

                                        if($connection->connect_error){
                                            die("Connection failed: ".$connection->connect_error);
                                        }

                                        $query = "SELECT * FROM karyawan";
                                        $query_run = mysqli_query($connection, $query);
                                        while($row = mysqli_fetch_array($query_run)){
                                    ?>
                                        <tr>
                                            <!-- <td> <img src="img/img4.png" alt="" width="40px" height="40px"> &nbsp; <?php echo $row['nama']; ?></td> -->
                                            <td> <?php echo $row['nama']; ?></td>
                                            <td> <text-muted> <?php echo $row['posisi']; ?></text-muted></td>
                                            <td> <?php echo $row['email']; ?></td>
                                            <td> <?php echo $row['role']; ?></td>
                                            <td style="text-align: center;" class="details-btn">
                                                <button data-toggle="modal" data-target="#editUser<?php echo $row['nip']; ?>" class="btn btn-info detbtn">Edit</button>

                                                <a href="del-user.php?nip=<?php echo $row['nip']; ?>" class="btn delbtn" onClick="javascript:hapus($(this));return false;">Delete</a>
                                                 
                                                <script>
                                                    function hapus(anchor) {
                                                        var r = confirm("Are you sure want to delete this user?");
                                                        if (r) {
                                                            window.location=anchor.attr("href");
                                                        }
                                                    }   
                                                </script>
                                            </td>
                                        </tr>
                                        <?php
                                            include 'edit-user.php';
                                            }
                                        ?>                                 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="userInfo" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="upper d-flex">
                                    <h4>Personal Details</h4>
                                    <a href="user.php" class="btn btn-info" title="Edit Profile"><span class="bi bi-pencil-square"></span></a>
                                </div>
                                <div class="user-main-info d-flex">
                                    <img src="img/img4.png" alt="">
                                    <div class="nama">
                                        <h5>Nadiya Ivana</h5>
                                        <text-muted>Front end</text-muted>
                                    </div>
                                </div>
                               <div class="row py-3">
                                   <div class="col-12 py-2">
                                       <div class="card user-sec-info">
                                           <div class="card-body">
                                                <h6>CONTACT</h6>
                                                <div class="card-text">
                                                    <div class="phonenum d-block">
                                                        <span class="bi bi-phone"></span>
                                                        <label>Add phone number</label>
                                                    </div>
                                                    <span class="bi bi-envelope"></span>
                                                    <label>nadiya.ivana@gmail.com</label>
                                                </div>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="col-12">
                                    <div class="card user-sec-info">
                                        <div class="card-body">
                                            <h6>ADDRESS</h6>
                                            <span class="bi bi-geo-alt"></span>
                                            <label>Jl. Juanda, Depok</label>
                                        </div>
                                    </div>
                                   </div>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>

<!------------------- Add user modal ----------------------->
                <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add New User</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="add-user.php" method="POST">
                                <div class="modal-body">
                                    <div class="alert alert-success d-none success"></div>
                                    <div class="alert alert-danger d-none error"></div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-2">Name</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" name="nama" id="nama" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-2">Position</label>
                                        <div class="col-10">
                                            <select class="form-control" name="posisi" id="posisi" required>
                                                <option value=""></option>
                                                <option value="Front End">Front End</option>
                                                <option value="Back End">Back End</option>
                                                <option value="Mobile Apps Developer">Mobile Apps Developer</option>
                                                <option value="Data Science">Data Science</option>
                                                <option value="IT Support">IT Support</option>
                                                <option value="Human Resource">Human Resource</option>
                                                <option value="Graphic Design">Graphic Design</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-2">Email</label>
                                        <div class="col-10">
                                            <input class="form-control" type="email" name="email" id="email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-2">Role</label>
                                        <div class="col-10">
                                            <select class="form-control" name="role" id="role" required>
                                                <option value=""></option>
                                                <option value="superadmin">Superadmin</option>
                                                <option value="admin">Admin</option>
                                                <option value="user">User</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="add" class="btn btn-info">Add</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
<!------------------- End Add user modal ----------------------->
            </div>
        </div>
    </div>
    <!--/#wrapper-->

    <script>
        // $(document).ready(function(){
        //     $('.detbtn').on('click', function(){
        //         $('#editUser').modal('show');

        //             $tr = $(this).closest('tr');
                    
        //             var data = $tr.children("td").map(function(){
        //                 return $(this).text();
        //             }).get();
                    
        //             console.log(data);

        //             $('#nama').val(data[0]);
        //             $('#posisi').val(data[1]);
        //             $('#email').val(data[2]);
        //             $('#role').val(data[3]);
        //     });
        // });
    </script>

    <script>
        $(document).ready(function() {
            $('#tblUsr').DataTable({
                responsive: true,
                "pageLength": 5
            });
        } );
    </script>
</body>
</html>