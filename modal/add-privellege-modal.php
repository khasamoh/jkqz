                <!-- #START# Add production Modal -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="modal fade" id="addPrivellegeModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Privellege</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post" autocomplete="off">
                                            <div class="row clearfix">
                                                <div class="col-md-5 col-sm-5">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" min="1" name="name" required />
                                                            <input type="hidden" class="form-control" min="1" name="addedDate" required value="<?php echo time();?>" />
                                                            <label class="form-label">Privellege Name *</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="option" required />
                                                            <label class="form-label">Privellege Prefix *</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-3">
                                                    <button type="submit" name="addprivellege" class="btn btn-primary waves-effect btn-hover color-8"><i class="fa fa-save"></i> Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Add production Modal -->