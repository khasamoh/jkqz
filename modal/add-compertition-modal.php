
                <!-- #START# Add production Modal -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="modal fade" id="addCompertitionModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add New Compertition</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post" autocomplete="off">
                                        <div class="body">
                                            <div class="row clearfix">
                                                <div class="col-md-12">
                                                    <div class="form-group form-float m-t-20">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="compertitionName" required />
                                                            <input type="hidden" class="form-control" name="addedDate" required value="<?php echo time(); ?>" />
                                                            <label class="form-label">Compertition Name *</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group form-float m-t-20">
                                                        <div class="form-line">
                                                            <input type="text" class="datepicker form-control"
                                                                placeholder="Compertition Date *" name="compertitionDate">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group form-float m-t-20">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="compertitionAddress" required />
                                                            <label class="form-label">Compertition Address *</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <button type="submit" name="addCompertition" class="btn btn-primary waves-effect btn-hover color-8 float-right"><i class="fa fa-save"></i> Save</button>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Add production Modal -->