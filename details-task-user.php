<div id="taskModal<?php echo $row['task_id']; ?>" class="taskModal modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <input class="form-control" type="hidden" name="task_id" value="<?php echo $row['task_id']; ?>">
                <h5 class="modal-title" id="myModalLabel">Task Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row h-100">
                    <div class="col-8 px-4">
                        <div class="task-header d-flex">
                            <h5><?php echo $row['nama_task']; ?></h5>
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
                        <p class="tooltip-test" title="Task Description"><?php echo $row['deskripsi']; ?></p>
                        <div class="comment">
                            <label>Comment</label>
                            <textarea class="form-control" readonly></textarea>
                        </div>
                        <div class="progbar">Progress</div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?php echo $row['percentage']; ?>%" aria-valuenow="<?php echo $row['percentage']; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $row['percentage']; ?>%</div>
                        </div>
                    </div>
                    <div class="col-4 updates">
                        <div class="card">
                            <div class="card-body time-task">
                                <div class="row">
                                    <div class="col-lg-6 division">
                                        <p class="text-muted">Start At</p>
                                        <p class="font-weight-bold">
                                            <?php $start = $row['start_date'];
                                                echo date("M j, Y", strtotime($start));
                                            ?></p>
                                    </div>
                                    <div class="col-lg-6">
                                        <p class="text-muted">Due Date</p>
                                        <p class="font-weight-bold">
                                            <?php echo date("M j, ", strtotime($row['end_date']));?>
                                            <?php echo date("H:i", strtotime($row['end_time']));?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-close" data-dismiss="modal">Close</button>
                <a href="update-task-user.php?task_id=<?php echo $row['task_id']; ?>" class="btn btn-primary">Update</a>
            </div>
        </div>  
    </div>                                  
</div>

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