<!-- #START# Add User Modal -->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="modal fade" id="viewAyah" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">View Ayah</h5>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <?php
                        $call->viewAyah();
                    ?>
                    </div>
                </div>
        </div>
    </div>
</div>
<!-- #END# Add user Modal -->