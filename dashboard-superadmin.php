<?php
    include 'koneksi.php';
    session_start();
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
                <li class="active">
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
                    <ul class="collapse list-unstyled" id="userSubmenu">
                        <li>
                            <a href="manage-user.php">Manage User</a>
                        </li>
                        <li>
                            <a href="profile-superadmin.php">Profile</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="logout.php">
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
                    <b class="menu">Dashboard Super Admin</b>
                </h5>

                <!-- <div class="search-wrapper">
                    <span class="bi bi-search"></span>
                    <input type="search" />
                </div> -->

                <div class="user-wrapper dropdown">
                    <?php
                        include 'user-wrapper.php';
                    ?>
                </div>
            </nav>

            <div class="container">
                <div class="row pt-4 pb-2">
                    <div class="col-6">
                        <div class="card informasi" style="border: none;">
                            <div class="card-header pt-4">
                                <h5 class="card-title">Information</h5>
                                <text-muted class="card-text">Infromasi mengenai karyawan yang sedang izin, cuti, dan WFH</text-muted>
                            </div>
                            <div class="card-body py-0 tabinfo">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>NAME</th>
                                            <th style="width:1px;">POSITION</th>
                                            <th style="text-align:center;">LEAVE</th>
                                            <th style="text-align:center;">DATE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $query = "SELECT karyawan.nama, karyawan.posisi, request.status_ketidakhadiran, request.dari_tanggal, request.sampai_tanggal, request.approval FROM request INNER JOIN karyawan ON request.nip=karyawan.nip WHERE request.approval='approve'";
                                        $query_run = mysqli_query($config, $query);
                                        while($row = mysqli_fetch_array($query_run)){
                                    ?>
                                        <tr style="text-align:center;">
                                            <td><?php echo $row['nama']; ?></td>
                                            <td><text-muted><?php echo $row['posisi']; ?></text-muted></td>
                                            <td ><?php echo $row['izin']?> (<?php echo $row['keterangan']?>)</td>
                                            <td><?php echo date("j/n/y", strtotime($row['dari_tanggal'])); ?> - <?php echo date("j/n/y", strtotime($row['sampai_tanggal'])); ?></td>
                                        </tr>
                                        <?php
                                            }
                                        ?> 
                                    </tbody>
                                </table>                                
                            </div>
                        </div>
                    </div>
                    <div class="col-6 pl-1">
                        <div class="card approval">
                            <h6 class="card-header">Needs Approval</h6>
                            <div class="card-body pt-2">
                            <?php
                                $query = "SELECT request.request_id, karyawan.nama, karyawan.posisi, request.status_ketidakhadiran, request.keterangan, request.dari_tanggal, request.sampai_tanggal FROM request INNER JOIN karyawan ON request.nip=karyawan.nip";
                                $query_run = mysqli_query($config, $query);
                                while($row = mysqli_fetch_array($query_run)){
                            ?>
                                <div class="row newreq">
                                    <div class="col-12">
                                        <div class="card" data-toggle="modal" data-target="#appRequest<?php echo $row['request.request_id']?>">
                                            <div class="card-body">
                                                <h6><b><?php echo $row['nama']; ?></b></h6>
                                                <p><?php echo $row['status_ketidakhadiran']?> (<?php echo $row['keterangan']?>)</p>
                                                <a href="#" class="stretched-link"></a>
                                                <div class="footer text-muted">
                                                    <?php echo date("j/n/y", strtotime($row['dari_tanggal'])); ?> - <?php echo date("j/n/y", strtotime($row['sampai_tanggal'])); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row px-0 pb-3">
                    <div class="col-6 mt-1 pt-2 d-flex">
                        <div class="card card-body color-card superadmin">
                            <div class="card-body chart">
                                <h6 class="card-title">Attendance</h6>
                                <text-muted>Employee attendance for a week</text-muted>
                            </div>
                            <div class="divchart">
                                <canvas id="pie" height="100" width="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include 'approve-request.php';?>
            </div>
        </div>
    </div>
    <!--/#wrapper-->

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/wordcloud.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://code.highcharts.com/modules/wordcloud.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

    <script>
        // Pie Chart
                var ctx = document.getElementById('pie').getContext('2d');
                var chart = new Chart(ctx, {
                    // The type of chart we want to create
                    type: 'pie',
                    backgroundColor: '#6a6a6a',
                
                    // The data for our dataset
                    data: {
                        labels: ['unpaid', 'izin', 'sakit', 'hadir', 'cuti'],
                        datasets: [{
                            label: 'Absensi',
                            data: [1, 3, 3, 17, 7],
                            backgroundColor: ['#FF6A6A','#FFC83A','#f7f725','#79D2DE','#A660FF'],
                            borderColor: ['#FF6A6A','#FFC83A','#f7f725','#79D2DE','#A660FF']
                        }]
                    },
                
                    // Configuration options go here
                    options: {
                        legend:{
                            display: true,
                            position: 'bottom',
                            labels:{
                                fontSize: 11,
                                boxWidth: 10,
                            }
                        }
                    }
                });
    </script>
</body>
</html>