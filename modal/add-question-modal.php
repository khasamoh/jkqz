                <!-- #START# Add User Modal -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="modal fade" id="addQuestionModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Upload New Question</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                                            <div class="row clearfix">
                                                <div class="col-lg-8 col-md-8 col-sm-8">
                                                    <div class="form-group form-float">
                                                        <div class="form-line focused select-padding">
                                                            <input type="file" class="form-control" name="picture" required/>
                                                            <label class="form-label active">Choose Picture</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4">
                                                    <input type="hidden" class="form-control" name="addedDate" value="<?php echo time(); ?>" required/>
                                                    <button type="submit" name="addquestion" class="btn btn-primary waves-effect btn-hover color-8"><i class="fa fa-save"></i> Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Add user Modal -->