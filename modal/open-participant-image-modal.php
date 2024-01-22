                <!-- #START# Add User Modal -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md" role="document">
                            <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Participant Image</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body center">
                                        <img class='img-responsive' style='border-radius: 50%; border: 1px solid gray; width: 170px; height: 170px' src='' alt='User' id="image"><br><br>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="row clearfix">
                                                <div class="col-lg-12">
                                                    <div class="form-group form-float">
                                                        <div class="form-line focused select-padding">
                                                            <input type="file" class="form-control" name="picture" required />
                                                            <label class="form-label active">Upload new Picture</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <input type="hidden" class="form-control" name="participant_id" id="participant_id" value="">
                                                    <button type="submit" name="updateStamp" class="btn btn-primary waves-effect btn-hover color-8"><i class="fa fa-upload"></i> Upload</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Add user Modal -->