<div id="taskModal<?php echo $row['task_id']; ?>" class="modal fade taskModal" role="dialog">
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
                        <div class="task-header">
                            <span class="bi bi-calendar-date"><text-muted> <?php echo date("l, d M Y", strtotime($row['created_at']));?></span><text-muted> by <?php echo $row['created_by']; ?></text-muted>
                            <div class="py-2">
                                <h5><?php echo $row['nama_task']; ?></h5>
                            </div>
                            <!-- <button type="button" id="done" class="btn-cancel tooltip-test" title="Mark as Done">
                            <span class="bi bi-check2 "></span>
                            </button> -->
                        </div>
                        <p class="tooltip-test" title="Task Description"><?php echo $row['deskripsi']; ?></p>
                        <div class="comment">
                            <label>Comment</label>
                            <textarea class="form-control" readonly><?php echo $row['comment']; ?></textarea>
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
                        <!-- insert timeline down here -->
                    </div>
                </div>
            </div>                        
            <div class="modal-footer">
                <button type="button" class="btn btn-close" data-dismiss="modal">Close</button>
                <a href="update-task.php?task_id=<?php echo $row['task_id']; ?>" class="btn btn-primary">Update</a>
            </div>
        </div>
    </div>
</div>

<script>
    var done = document.getElementById( 'done' ),
    undone = document.getElementById( 'undone' );

    function toggle() {
        if ( done.style.display === "block" ) {
            done.style.display = "none";
            undone.style.display = "block";

        } else { // switch back
            done.style.display = "block";
            undone.style.display = "none";
        }
    }

    done.onclick = toggle;
    undone.onclick = toggle;
</script>