<?php
	session_start();
	include("koneksi.php");
	if (@$_SESSION['username'] == "")
	{
		header("location:login.php?pesan=Belum Login");
		exit;
	}
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
                    <a href="dashboard.php">
                    <i class="bi bi-grid"></i>Dashboard</a>
                </li>
                <li>
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
                    <b class="menu">Dashboard Admin</b>
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
                <div class="row px-3">
                    <div class="col-6 mt-4 pt-2 d-flex pl-1">
                        <div class="card card-body color-card">
                            <div class="card-body chart">
                                <div class="chart-body">
                                    <canvas id="pie" height="100" width="200"></canvas>
                                </div>
                                <h6 class="card-title">Attendance</h6>
                                <text-muted>Your attendance recap in the last 30 days</text-muted>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mt-4 pt-2 d-flex pl-1">
                        <div class="card card-body color-card2">
                            <div class="card-body chart">
                                <div class="chart-body">
                                    <canvas id="bar" height="150"></canvas>
                                </div>
                                <h6 class="card-title">Tasks Progress</h6>
                                <text-muted>Your task progress all the time</text-muted>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row table-task px-3">
                    <div class="col-12 mt-4 py-3 pl-1">
                        <div class="card">
                            <div class="card-body">
                                <div class="header">
                                    <h5 class="title">New Task</h5>
                                </div>
                                <table class="table w-100">
                                    <thead>
                                        <tr>
                                            <th>TITLE</th>
                                            <th>DESCRIPTION</th>
                                            <th>DUE DATE</th>
                                            <th>STATUS</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Bikin Tampilan Web</td>
                                            <td>Bikin tampilan program web pake html css bootstrap react</td>
                                            <td>2021-02-12</td>
                                            <td class="indikator">Undone</td>
                                            <td class="details-btn">
                                                <button type="button" class="btn btn-info detbtn" data-toggle="modal" data-target="#taskModal">Details</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Bikin Tampilan Web</td>
                                            <td>Bikin tampilan program web pake html css bootstrap react</td>
                                            <td>2021-02-12</td>
                                            <td class="indikator">Undone</td>
                                            <td class="details-btn">
                                                <button type="button" class="btn btn-info detbtn" data-toggle="modal" data-target="#taskModal">Details</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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
        $("#done").click(function() {
            $(this).toggleClass('red');
        });
        jQuery(function($) {
            $('#done').on('click', function() {
                var $el = $(this);
            $el.find('span').toggleClass('bi-check2 bi-x');
        }
    )});
    </script>

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

    <script>
        var ctx = document.getElementById('bar').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Progress','Task Done', 'Progress', 'Task Done', 'Progress', 'Task Done'],
                datasets: [{
                    label: [],
                    data: [2, 1, 3, 2, 5, 5],
                    backgroundColor: [
                        'rgba(255, 206, 86, 1)', //yellow
                        'rgba(76, 191, 143, 1)', //green
                        'rgba(255, 206, 86, 1)',
                        'rgba(76, 191, 143, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(76, 191, 143, 1)'
                    ],
                    borderColor: [
                        'rgba(255, 206, 86, 1)',
                        'rgba(76, 191, 143, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(76, 191, 143, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(76, 191, 143, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title:{
                    display: true,
                    text:''
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false
                        },
                        stacked: true
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</body>
</html>