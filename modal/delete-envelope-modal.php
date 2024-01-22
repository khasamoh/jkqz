<!-- #START# delete Modal -->
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="" method="post"><div class="modal-body" autocomplete="off">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Confirm delete Envelope</h3>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <h4 class="center">Are you sure you want delete Envelope<br><br>Number <span id="uname"></span>?
                            <input type="hidden" name="envelope_id" id="did" class="form-control" value="">
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger waves-effect" name="delete"><i class="fa fa-trash"></i> Yes</button>
                        <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- #END# delete Modal -->