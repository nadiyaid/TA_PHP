<div id="appRequest<?php echo $row['request_id']; ?>" class="modal fade" role="dialog">
    <div class="appRequest modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Employee Leave</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="approve-query.php" method="POST">
                <div class="modal-body">
                    <div class="reqinfo">
                        <input class="form-control" type="hidden" name="request_id" value="<?php echo $row['request_id']; ?>">
                        <div class="req-header d-flex">
                            <span class="bi bi-calendar-date"><text-muted> <?php echo date("l, d M Y", strtotime($row['tanggal_request']));?></span>
                            <p class="stat">Waiting</p>
                        </div>
                        <div class="form-group d-flex req-date">
                            <div class="fromdate">
                                <label class="col-form-label">From:</label>
                                <input type="date" class="form-control" id="recipient-name" readonly value="<?php echo $row['dari_tanggal'];?>"></input>
                            </div>
                            <div class="todate">
                                <label class="col-form-label">To:</label>
                                <input type="date" class="form-control" id="recipient-name" readonly value="<?php echo $row['sampai_tanggal'];?>"></input>
                            </div>
                        </div>
                        <label class="col-form-label">Leave Type:</label>
                        <div class="form-group radio">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" disabled
                                    <?php if($row['status_ketidakhadiran']=="1") {echo "checked";}?> value="1">
                                <label class="form-check-label">
                                    Izin
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" disabled
                                <?php if($row['status_ketidakhadiran']=="2"){echo "checked";}?> value="2">
                                <label class="form-check-label">
                                    Sakit
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" disabled
                                <?php if($row['status_ketidakhadiran']=="3") {echo "checked";}?> value="3">
                                <label class="form-check-label">
                                    Cuti
                                </label>
                            </div>
                        </div>
                        <div class="form-group keterangan">
                            <label for="message-text" class="col-form-label">Excuse:</label>
                            <textarea class="form-control" readonly><?php echo $row['keterangan'];?></textarea>
                        </div>
                    </div>
                    <div class="form-group pt-1">
                        <label for="message-text" class="col-form-label">Comment:</label>
                        <textarea class="form-control" placeholder="(Visible to Employee)"></textarea>
                    </div>
                    <div class="app-button">
                        <button type="submit" class="btn btn-danger" name="decline">Decline</button>
                        <button type="submit" class="btn btn-primary" name="approve">Approve</button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-close" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>