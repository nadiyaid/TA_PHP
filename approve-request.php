<!-- Modal -->
<div id="appRequest<?php echo $row['request.request_id']; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xl" role="document">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel">Employee Leave</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row reqinfo">
                <div class="col-12">
                    <div class="req-header d-flex">
                        <span class="bi bi-calendar-date"><text-muted> <?php echo date("l, d M Y", strtotime($row['tanggal_request']));?><?php $tgl = $row['tanggal'];?></text-muted></span>
                        <p class="stat">Waiting</p>
                    </div>
                    <div class="d-flex req-date">
                        <div class="fromdate">
                            <label class="col-form-label">From:</label>
                            <input type="date" class="form-control" id="recipient-name" readonly value="<?php echo $row['dari_tanggal']?>">
                        </div>
                        <div class="todate">
                            <label class="col-form-label">To:</label>
                            <input type="date" class="form-control" id="recipient-name" readonly value="<?php echo $row['sampai_tanggal']?>">
                        </div>
                    </div>
                    <div class="leave-type pt-3">Leave Type
                        <div class="form-group radio">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" value="1">
                                <label class="form-check-label" checked>
                                    Izin
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" value="2">
                                <label class="form-check-label">
                                    Sakit
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" value="3">
                                <label class="form-check-label">
                                    Cuti
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="excuse">Excuse
                        <div class="form-group">
                            <textarea class="form-control" readonly><?php echo $row['keterangan']?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-3 reqapp">
                <div class="col-12">
                    <div class="comment">Comment
                        <div class="form-group">
                            <textarea class="form-control" placeholder="(Visible to Employee)"></textarea>
                        </div>
                    </div>
                    <div class="app-button">
                        <a href="#" class="btn btn-danger">Decline</a>
                        <a href="#" class="btn btn-primary">Approve</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-close" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>